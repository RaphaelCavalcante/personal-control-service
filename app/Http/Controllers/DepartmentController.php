<?php

namespace App\Http\Controllers;

use App\models\Company;
use App\models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function ping() {
        return response('PING');
    }
    public function index() {
        return response()->json(Department::all());
    }
    public function create(Request $request) {
        $request->validate([
            'name'=>'required',
            'company_id'=>'required'
        ]);
        $company = Company::find($request->company_id);
        if($company!=null){
            $department = new Department($request->all());
            $department->company_id=$company->id;
            $department->save();
        }
        return response()->json($department, 200);
    }
    public function get($id) {
        $department = Department::find($id);
        return response()->json($department, 200);
    }
    public function getDepartmentPositions($id){
        $department = Department::find($id);
        return response()->json($department->positions()->get());
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
