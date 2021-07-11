<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $companies = Company::orderBy('id','asc')->get();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('company.create',compact('companies'));
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
            'name' => 'required',
            
        ]);

        if ($validator->fails()) {
            Alert::warning('Ooops...!', 'Incorrect input');
            return redirect()->route('company.create')->withSuccessMessage('Company name is requierement');
        }
        
        $logo =  $request->file('logo')->getClientOriginalName();
        $newLogoName = time() . '-' . $request->name .'.' . $request->logo->extension(); 
        $request->logo->move(public_path('images'),$newLogoName);
        $data = Company::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'logo' => $newLogoName,
        'website' => $request->input('website'),
        ]);
        $data->save();
        Alert::success('Success', 'Add new company');
        return redirect()->route('company')->withSuccessMessage('Company has been added');
    
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
        $companies = Company::findOrFail($id);
        $data_companies = Company::all();
        return view('company.edit', compact('companies','data_companies'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',     
        ]);
        if ($validator->fails()) {
            Alert::warning('Ooops...!', 'Incorrect input');
            return redirect()->route('company.create')->withSuccessMessage('Company name is requierement');
        }
        
        $logo =  $request->file('logo');
        $newLogoName = time() . '-' . $request->name .'.' . $request->logo; 
        //$request->logo->move(public_path('images'),$newLogoName);
        
        $companies = Company::findOrFail($id);
        $companies->name = $request->name;
        $companies->email = $request->email;
        $companies->logo = $request->logo_name;
        $companies->website = $request->website;
        $companies->save();
        Alert::success('Success', 'Edit Company');
        return redirect()->route('company')->withSuccessMessage('Company has been edited');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $companies = Company::findOrFail($request->id);
        $companies->delete();
        Alert::success('Delete Data', 'Success');
        return redirect()->route('company')->withSuccessMessage('Data has been deleted'); 
    }
}
