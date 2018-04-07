<?php

namespace App\Http\Controllers;

use App\models\Employee;
use App\models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //    
    public function index() {
        return response()->json(Employee::all());
    }
    public function create(Request $request) {
        $request->validate([
            'name'=>'required',
            'phone_num'=>'required',
            'email'=>'required',
            'position'=>'required'
        ]);
        $employee = new Employee($request->all());
        $position_id = $request->position;
        $position = Position::find($position_id);
        $employee->save();
        
        $position->employees()->attach($employee);


        return response()->json($employee, 200);
    }
    public function get($id) {
        $employee = Employee::find($id);
        return response()->json($employee, 200);
    }
    public function update($id, Request $request){
        $request->validate([
            'name'=>'required',
            'phone_num'=>'required',
            'email'=>'required'
        ]);
        $employee = Employee::find($id);
        $employee->update($request->all());
        return response()->json($employee, 200);
    }
    public function delete($id) {
        $employee = Employee::find($id);
        $response = 'NOT FOUND';
        if ($employee != null) {
            $employee->delete();
            $response = 'DELETED';
        }

        return response($response);
    }

}
