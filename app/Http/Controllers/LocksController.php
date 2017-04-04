<?php

namespace App\Http\Controllers;


use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Lock;
use App\User;
use Auth;

class LocksController extends Controller
{
  private function lcRandomPassword()
  {
    $length = 15;
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    return substr( str_shuffle( $chars ), 0, $length );
  }
  private function lcRandomBonding()
  {
    $length = 6;
    $chars = '0123456789';
    return substr( str_shuffle( $chars ), 0, $length );
  }


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function lcShow()
    {

      $locks = Lock::all();
      return view('lock.lcList', compact('locks'));

    }
    public function lcEdit(Lock $Lock)
    {
      $users = User::all();
      return view('lock.lcEdit', compact('Lock','users'));

    }
    public function lcCreate()
    {
      $password = $this->lcRandomPassword();
      $bonding = $this->lcRandomBonding();
      return view('lock.lcCreate',compact('password', 'bonding'));

    }

    public function lcUpdate(Request $request, Lock $Lock)
    {
      $Lock->update($request->all());
      return back();
    }

    public function lcDelete(Lock $Lock)
    {
      $Lock->delete();
      return back();
    }

    public function lcConnect(Request $request, Lock $Lock)
    {
      $User = User::find($request['user']);
      if(!($Lock->users->contains($User)))
      {
        $Lock->users()->attach($User);
      }
      return back();
    }

    public function lcUserRemove(Lock $Lock, User $User)
    {
      $Lock->users()->detach($User);
      return back();
    }

    public function lcStore(Request $request)
    {
      $this->validate($request, [
        'room' => 'required|unique:locks,room',
        'address' => 'required|unique:locks,address',
        'password' => 'required|min:6|max:15',
        'bonding' => 'required|min:4|max:6'
      ]);

      $Lock = new Lock($request->all());
      $Lock->save();

      return back();
    }
    public function lcBuild(Lock $Lock)
    {
      $contents = file_get_contents(public_path() . '/Build/deviceinfo.h');

      $contents = $contents . '/*Device Name*/ ' . PHP_EOL . 'const static char       DEVICE_NAME[]           = "'.$Lock->room.'";'. PHP_EOL;
      $contents = $contents . '/*Device Password*/ ' . PHP_EOL . 'const char              PASSWORD[]              = "'.$Lock->password.'";'. PHP_EOL;
      $contents = $contents . '/*Device Bonding Password*/ ' . PHP_EOL . 'const char              BONDING[]              = "'.$Lock->bonding.'";'. PHP_EOL;
      //dd($contents);

      file_put_contents(public_path() . '/Build/SmartLock/deviceinfo.h', $contents);

      if(file_exists(public_path() . '/Build/SmartLock/Makefile'))
      {
        $commandMake = 'sudo -u root -S make --directory="'.public_path(). '/Build/SmartLock/" 2>&1 < /home/dries/.sudopass/sudopass.secret';
        $commandMakeClean = 'sudo -u root -S make clean --directory="'.public_path(). '/Build/SmartLock/" 2>&1 < /home/dries/.sudopass/sudopass.secret';
        $process = new Process($commandMakeClean);
        $process->run();
        if (!$process->isSuccessful()) {
          throw new ProcessFailedException($process);
        }
        $process = new Process($commandMake);
        $process->run();
        if (!$process->isSuccessful()) {
          throw new ProcessFailedException($process);
        }
        $folderPath = public_path(). '/'. $Lock->room .'/';
        if (!file_exists($folderPath))
        {
          mkdir($folderPath, 0777);
        }
        if ( ! copy(public_path() .'/Build/SmartLock/BUILD/SmartLock.hex' , $folderPath . 'SmartLock.hex'))
        {
            die("Couldn't move file");
        }
        if ( ! copy(public_path() .'/Build/SmartLock/Hex/bootloader.hex' , $folderPath . 'bootloader.hex'))
        {
            die("Couldn't move file");
        }
        if ( ! copy(public_path() .'/Build/SmartLock/Hex/softdevice.hex' , $folderPath . 'softdevice.hex'))
        {
            die("Couldn't move file");
        }
        if ( ! copy(public_path() .'/Build/SmartLock/Hex/nrf51_stlink.tcl' , $folderPath . 'nrf51_stlink.tcl'))
        {
            die("Couldn't move file");
        }
        if ( ! copy(public_path() .'/Build/SmartLock/Hex/stlink-v2.cfg' , $folderPath . 'stlink-v2.cfg'))
        {
            die("Couldn't move file");
        }
        if ( ! copy(public_path() .'/Build/SmartLock/Hex/telnet.vbs' , $folderPath . 'telnet.vbs'))
        {
            die("Couldn't move file");
        }
        if ( ! copy(public_path() .'/Build/SmartLock/Hex/install.bat' , $folderPath . 'install.bat'))
        {
            die("Couldn't move file");
        }
        if ( ! copy(public_path() .'/Build/SmartLock/Hex/mergehex.exe' , $folderPath . 'mergehex.exe'))
        {
            die("Couldn't move file");
        }
         $files = glob(public_path().'/'.$Lock->room.'/*');
         \Zipper::make(public_path(). "/" .$Lock->room . '.zip')->add($files)->close();

         sleep(10);

         if ( ! unlink($folderPath . 'SmartLock.hex'))
         {
             die("Couldn't delete file");
         }
         if ( ! unlink($folderPath . 'bootloader.hex'))
         {
             die("Couldn't delete file");
         }
         if ( ! unlink($folderPath . 'softdevice.hex'))
         {
             die("Couldn't delete file");
         }
         if ( ! unlink($folderPath . 'nrf51_stlink.tcl'))
         {
             die("Couldn't delete file");
         }
         if ( ! unlink($folderPath . 'stlink-v2.cfg'))
         {
             die("Couldn't delete file");
         }
         if ( ! unlink($folderPath . 'telnet.vbs'))
         {
             die("Couldn't delete file");
         }
         if ( ! unlink($folderPath . 'install.bat'))
         {
             die("Couldn't delete file");
         }
         if ( ! unlink($folderPath . 'mergehex.exe'))
         {
             die("Couldn't delete file");
         }
         if ( ! rmdir($folderPath))
         {
             die("Couldn't delete folder");
         }

         return response()->download(public_path().'/'.$Lock->room . '.zip');
      }
      else
      {
        echo("No Makefile");
      }

    }

}
