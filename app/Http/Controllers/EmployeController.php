<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $employes = Employe::paginate(10);
        return view('employe.index', compact('employes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $employes = Employe::select('id','firstName','lastName','company_id','email','phonenumber')->orderBy('id','desc')->get();
        return view('employe.create',compact('employes','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required|min:9'
            
        ]);

        if ($validator->fails()) {
            Alert::warning('Ooops...!', 'Incorrect input');
            return redirect()->route('employe.create')->withSuccessMessage('Makesure First & Last Name has been filled ');
        }

        $data = new Employe;
        $data->firstName = $request->firstName;
        $data->lastName = $request->lastName;
        $data->company_id = $request->company_id;
        $data->email = $request->email;
        $data->phonenumber = $request->phonenumber;
        $data->save();
           
            Alert::success('Success', 'Add new company');
            return redirect()->route('employe')->withSuccessMessage('Company has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employe.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employes = Employe::findOrFail($request->id);
        $employes->delete();
        Alert::success('Delete Data', 'Success');
        return redirect()->route('employe')->withSuccessMessage('Data has been deleted'); 
    }
}
