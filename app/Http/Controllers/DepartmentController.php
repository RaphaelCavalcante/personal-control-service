<?php

namespace App\Http\Controllers;

use App\models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index() {
        return response()->json(Department::all());
    }
    public function create(Request $request) {
        $request->validate([
            'name'=>'required',
        ]);
        $department = new Department($request->all());
        $department->save();

        return response()->json($department, 200);
    }
    public function get($id) {
        $department = Department::find($id);
        return response()->json($department, 200);
    }
    public function update($id, Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        $department = Department::find($id);
        $department->update($request->all());
        return response()->json($department, 200);
    }
    public function delete($id) {
        $department = Department::find($id);
        $response = 'NOT FOUND';
        if ($department != null) {
            $department->delete();
            $response = 'DELETED';
        }
        return response($response);
    }

}
