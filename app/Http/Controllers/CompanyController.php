<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Company;
use Illuminate\Http\UploadedFile;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $companies = Company::all()
        ->sortByDesc('id')
        ->where('deletion_status', 0)
        ->toArray();
        return view('administrator.setting.company.manage_companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('administrator.setting.company.add_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = $this->validate(request(), [
            'company_name' => 'required|unique:companies|max:100',
            'company_code' => 'required|unique:companies|max:100',
            'company_description' => 'nullable',
            'company_website' => 'nullable',
            'company_contact_number' => 'nullable',
            'company_logo' => 'nullable|mimes:jpeg,png,jpg,gif',
            'company_email' => 'nullable',
            'publication_status' => 'required',
            
        ]);
        if (!empty($company['company_logo'])) {
            $file = $company['company_logo'];
            $contents = $file->openFile()->fread($file->getSize());
        }
        else{
            $contents = '';
        }
       
        $company = new Company;
        $company->company_name = $request->get('company_name');
        $company->company_code = $request->get('company_code');
        $company->company_description = $request->get('company_description');
        $company->company_website = $request->get('company_website');
        $company->company_contact_number = $request->get('company_contact_number');
        $company->company_email = $request->get('company_email');
        $company->publication_status = $request->get('publication_status');
        $company->company_logo = $contents;
        $company->created_by =  auth()->user()->id;
        $affected_row = $company->save();

        
        if (!empty($affected_row)) {
            return redirect('/setting/companies/create')->with('message', 'Add successfully.');
        }
        return redirect('/setting/companies/create')->with('exception', 'Operation failed !');
    }
    
    public function published($id) {
        $affected_row = Company::where('id', $id)
        ->update(['publication_status' => 1]);
        
        if (!empty($affected_row)) {
            return redirect('/setting/companies')->with('message', 'Published successfully.');
        }
        return redirect('/setting/companies')->with('exception', 'Operation failed !');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unpublished($id) {
        $affected_row = Company::where('id', $id)
        ->update(['publication_status' => 0]);
        
        if (!empty($affected_row)) {
            return redirect('/setting/companies')->with('message', 'Unpublished successfully.');
        }
        return redirect('/setting/companies')->with('exception', 'Operation failed !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $company = DB::table('companies')
        ->join('users', 'companies.created_by', '=', 'users.id')
        ->select('companies.*', 'users.name')
        ->where('companies.id', $id)
        ->first();
        return view('administrator.setting.company.show_company', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id)->toArray();
        return view('administrator.setting.company.edit_company', compact('company'));
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
        $edit_company =   $this->validate(request(), [
            'company_name' =>'required|max:100',
            'company_code' => 'required|max:100',
            'company_description' => 'nullable',
            'company_website' => 'nullable',
            'company_contact_number' => 'nullable',
            'company_logo' => 'nullable',
            'company_email' => 'nullable',
            'publication_status' => 'required',
        ]);
        if(!empty($edit_company['company_logo'])){
            
            $files = $edit_company['company_logo'];
            $contents = $files->openFile()->fread($files->getSize());
            $company->company_logo = $contents;
        }
       
        $company->company_name = $request->get('company_name');
        $company->company_code = $request->get('company_code');
        $company->company_website = $request->get('company_website');
        $company->company_contact_number = $request->get('company_contact_number');
        $company->company_email = $request->get('company_email');
        $company->company_description = $request->get('company_description');
        $company->publication_status = $request->get('publication_status');
        $affected_row = $company->save();
        
        if (!empty($affected_row)) {
            return redirect('/setting/companies')->with('message', 'Update successfully.');
        }
        return redirect('/setting/companies')->with('exception', 'Operation failed !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
