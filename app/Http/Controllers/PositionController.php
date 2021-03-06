<?php

namespace App\Http\Controllers;

use App\models\Position;
use App\models\Department;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    //
    public function index() {
        return response()->json(Position::all());
    }
    public function create(Request $request) {
        $request->validate([
            'name'=>'required',
            'department_id'=>'required'
        ]);
        $department = Department::find($request->department_id);
        if($department!=null){
            $position = new Position($request->all());
            $position->department_id = $request->department_id;
            $position->save();
        }
        return response()->json($position, 200);
    }
    public function get($id) {
        $position=Position::find($id);
        return response()->json($position, 200);
    }
    public function update($id, $request){
        $request->validate([
            'name'=>'required'
        ]);
        $position = Position::find($id);
        $position -> update($request->all());
        return response()->json($position, 200);
    }
    public function delete($id) {
        $position = Position::find($id);
        $response = 'NOT FOUND';
        if($position!=null){
            $position->delete();
            $response = 'DELETED';
        }
        return response($response);
    }
    public function findPositionByName($name){
        $position = Position::where('name','=',$name)->first();
        return response()->json($position);
    }
    public function findAllEmployeesOnPosition($id) {
        $position = Position::find($id);
        if($position!=null){
            $allEmployees = $position->employees()->wherePivot('position_id', '=', $position->id)->count();
        }
        return response()->json($allEmployees, 200);
    }
    
}
