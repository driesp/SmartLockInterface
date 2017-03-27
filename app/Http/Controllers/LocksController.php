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

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show()
    {

      $locks = Lock::all();
      return view('home.locks', compact('locks'));

    }
    public function edit(Lock $Lock)
    {
      $users = User::all();
      return view('home.lockEdit', compact('Lock','users'));

    }
    public function create()
    {

      return view('home.lockCreate');

    }

    public function update(Request $request, Lock $Lock)
    {
      $Lock->update($request->all());
      return back();
    }

    public function delete(Lock $Lock)
    {
      $Lock->delete();
      return back();
    }

    public function connect(Request $request, Lock $Lock)
    {
      $User = User::find($request['user']);
      if(!($Lock->users->contains($User)))
      {
        $Lock->users()->attach($User);
      }
      return back();
    }

    public function removeUser(Lock $Lock, User $User)
    {
      $Lock->users()->detach($User);
      return back();
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'room' => 'required|unique:locks,room',
        'address' => 'required|unique:locks,address',
        'password' => 'required|min:6'
      ]);

      $Lock = new Lock($request->all());
      $Lock->save();

      return back();
    }
    public function build(Lock $Lock)
    {
      $contents = file_get_contents(public_path() . '/Build/deviceinfo.h');

      $contents = $contents . '/*Device Name*/ ' . PHP_EOL . 'const static char       DEVICE_NAME[]           = "'.$Lock->room.'";'. PHP_EOL;
      $contents = $contents . '/*Device Password*/ ' . PHP_EOL . 'const char              PASSWORD[]              = "'.$Lock->password.'";'. PHP_EOL;
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
