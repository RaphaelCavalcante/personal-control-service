<?php

namespace App\Http\Controllers;

use App\models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    
    public function ping() {
        return response('PING');
    }
    
    public function index() {
        return response()->json(Company::all());
    }
    public function create(Request $request) {
        $request->validate([
            'name'=>'required',
            'address'=>'required'
        ]);
        $company = new Company($request->all());
        $company->save();

        return response()->json($company, 200);
    }
    public function get($id) {
        $company = Company::find($id);
        return response()->json($company, 200);
    }
    public function getCompanyDepartments($id){
        $company = Company::find($id);

        return response()->json($company->departments()->get());
    }
    public function update($id, Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        $company = Company::find($id);
        $company->update($request->all());
        return response()->json($company, 200);
    }
    public function delete($id) {
        $company = Company::find($id);
        $response = 'NOT FOUND';
        if ($company != null) {
            $company->delete();
            $response = 'DELETED';
        }
        return response($response);
    }
}
