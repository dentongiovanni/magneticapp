<?php

namespace Magnetic\Planner\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use Magnetic\Planner\Events\CsvEvent;
use Magnetic\Planner\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
         $results = Company::with('employees')->get();
         return $results;
          /*if($request->ajax()){
            return $results;
         }else{
            return view('planner::company/list')->with('results',$results);   
         }*/
 
    }

    public function companyList(){

        
        $results = Company::with('employees')->get();
        $user_email = Auth::user()->email;
        return view('planner::company/list')->with('results',$results)
                                            ->with('user_email',$user_email);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $results = Company::create($request->all());
        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Company::find($id);
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Company::find($id);
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->update($request->all());
        return $company;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Company::destroy($id);
        return $result;
    }

    public function generateCSV(Request $request){
         $email = $request->email;
         event(new CsvEvent($email));
    }

}
