<?php

namespace App\Http\Controllers;


use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Ground;
use App\Building;
use App\Floor;
use App\Lock;
use App\User;

class FloorplanController extends Controller
{
  /**
   * Constructor for the floorplan controller
   * make sure it uses middleware auth so people
   * who aren't authenticated can't access the pages.
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('admin');
  }

  protected function fcGroundValidator(array $data)
  {
    return Validator::make($data,[
      'name' => 'required',
      'x1x' => 'required',
      'x1y' => 'required',
      'x2x' => 'required',
      'x2y' => 'required',
      'x3x' => 'required',
      'x3y' => 'required',
      'x4x' => 'required',
      'x4y' => 'required',
    ]);
  }

  /**
   * Validator for the Building data. Throw's error when data
   * doesn't validate against the rules.
   * @param  array  $data Input data from Post request
   */
  protected function fcBuildingValidator(array $data)
  {
    return Validator::make($data,[
      'name' => 'required|unique:grounds,name',
      'filename' => 'required|unique:grounds,filename'
    ]);
  }

  /**
   * gets every Ground from the database and sends
   * them to the view
   * @return view view with all the Grounds
   */
  public function fcGroundsShow()
  {
    $grounds = Ground::All();
    return view('floorplan.fcGroundsShow', compact('grounds'));

  }

  /**
   * return the view where all the buildings can be
   * seen -> Buildings can be selected
   * @param  Ground $Ground Ground
   * @return view
   */
  public function fcGroundView(Ground $Ground)
  {
    return view('floorplan.fcGroundView', compact('Ground'));
  }

  public function fcGroundCreate()
  {
    return view('floorplan.fcGroundCreate');
  }

  public function fcGroundDatabaseInsert(Request $request)
  {
    $file = $request->file('file');
    $file->move('uploads', $file->getClientOriginalName());
    $request->request->add(['filename' => $file->getClientOriginalName()]);
    $this->fcGroundValidator($request->all());
    $Ground = new Ground($request->all());
    $Ground->save();
    return back();
  }

    public function fcBuildingCreate(Ground $Ground)
    {
      return view('floorplan.fcBuildingCreate', compact('Ground'));
    }

    public function fcBuildingInsert(Request $request, Ground $Ground)
    {
      $this->fcBuildingValidator($request->all());
      $building = new Building($request->all());
      $building->save();
      $Ground->buildings()->save($building);
      return back();
    }

    public function fcBuildingView(Ground $Ground, Building $Building)
    {
      $Floors = $Building->Floors;
      return view('floorplan.fcBuildingView', compact('Ground', 'Building', 'Floors'));
    }

    public function fcFloorCreate(Ground $Ground, Building $Building)
    {
      return view('floorplan.fcFloorCreate', compact('Ground','Building'));
    }
    public function fcFloorInsert(Request $request, Ground $Ground, Building $Building)
    {
      $file = $request->file('file');
      $file->move('uploads/floors', $file->getClientOriginalName());
      $request->request->add(['filename' => $file->getClientOriginalName()]);
      $this->validate($request, [
        'name' => 'required',
        'filename' => 'required|unique:floors,filename'
      ]);
      $Floor = new Floor($request->all());
      $Floor->save();
      $Building->Floors()->save($Floor);
      return back();
    }

    public function fcFloorView(Ground $Ground, Building $Building, Floor $Floor)
    {
      return view('floorplan.fcFloorView', compact('Ground','Building','Floor'));
    }

    public function fcFloorLockAdd(Ground $Ground, Building $Building, Floor $Floor)
    {
      $Locks = Lock::where('floor_id', null)->get();
      return view('floorplan.fcFloorLockAdd', compact('Ground','Building','Floor', 'Locks'));
    }
    public function fcFloorLockInsert(Request $request, Ground $Ground, Building $Building, Floor $Floor)
    {
      $lock = Lock::find($request['id']);
      $lock->update($request->all());
      $Floor->Locks()->save($lock);
      return back();
    }
    public function fcFloorLocks(Ground $Ground, Building $Building, Floor $Floor)
    {
      return view('floorplan.fcFloorLocks', compact('Ground','Building','Floor'));
    }
    public function fcFloorLockDelete(Ground $Ground, Building $Building, Floor $Floor, Lock $Lock)
    {
      $Lock->floor_id = NULL;
      $Lock->save();
      return back();
    }

}
