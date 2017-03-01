<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Ground;
use App\Building;
use App\Floor;
use App\Lock;

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
    return view('floorplan.floorplan', compact('grounds'));

  }

  public function fcGroundView(Ground $Ground)
  {
    return view('floorplan.view', compact('Ground'));

  }

  public function fcGroundCreateView()
  {
    return view('floorplan.createGrounds');
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

    public function createBuilding(Ground $Ground)
    {
      return view('floorplan.createBuilding', compact('Ground'));
    }

    public function insertBuilding(Request $request, Ground $Ground)
    {
      $this->fcBuildingValidator($request->all());
      $building = new Building($request->all());
      $building->save();
      $Ground->buildings()->save($building);
      return back();
    }

    public function viewBuilding(Ground $Ground, Building $Building)
    {
      $Floors = $Building->Floors;
      return view('floorplan.viewBuilding', compact('Ground', 'Building', 'Floors'));
    }

    public function createFloor(Ground $Ground, Building $Building)
    {
      return view('floorplan.createFloor', compact('Ground','Building'));
    }
    public function insertFloor(Request $request, Ground $Ground, Building $Building)
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

    public function showFloor(Ground $Ground, Building $Building, Floor $Floor)
    {
      return view('floorplan.floor', compact('Ground','Building','Floor'));
    }

    public function addlock(Ground $Ground, Building $Building, Floor $Floor)
    {
      $Locks = Lock::where('floor_id', null)->get();
      return view('floorplan.addlock', compact('Ground','Building','Floor', 'Locks'));
    }
    public function insertlock(Request $request, Ground $Ground, Building $Building, Floor $Floor)
    {
      $lock = Lock::find($request['id']);
      $lock->update($request->all());
      $Floor->Locks()->save($lock);
      return back();
    }
}
