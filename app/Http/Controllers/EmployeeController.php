<?php

namespace App\Http\Controllers;

use App\models\Employee;
use App\models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function getEmployeeList() {
        $result = DB::select(
            "select ".
                "employees.id as employee_id, ".
                "employees.name as employee_name, ".
                "employees.email as employee_email, ".
                "employees.phone_num as employees_phone, ".
                "departments.name as department_name, ".
                "positions.name as positions_name, ".
                "companies.name as company_name ".
                "from employees ".
            "join ".
                "positions on positions.id ".
            "in ".
                "(select position_id from employee_position ".
                "where employee_position.employee_id=employees.id) ".
            "join ".
            "departments on departments.id=positions.department_id ".
            "join ".
            "companies ".
            "on ".
            "companies.id=departments.company_id;"
        );
        return response()->json($result, 200);
    }


    public function getCompleteEmployee($id) {
        $result = DB::select(
            "select ".
                "employees.id as employee_id, ".
                "employees.name as employee_name, ".
                "employees.email as employee_email, ".
                "employees.phone_num as employees_phone, ".
                "departments.id as department_id, ".
                "departments.name as department_name, ".
                "positions.name as positions_name, ".
                "companies.id as company_id, ".
                "companies.name as company_name ".
                "from employees ".
            "join ".
                "positions on positions.id ".
            "in ".
                "(select position_id from employee_position ".
                "where employee_position.employee_id=employees.id) ".
            "join ".
            "departments on departments.id=positions.department_id ".
            "join ".
            "companies ".
            "on ".
            "companies.id=departments.company_id where employees.id=$id;"
        );
        return response()->json($result, 200);
    }
}
