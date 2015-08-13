<?php

namespace App\Http\Controllers;

use App\User;
use Faker\Test\Provider\pt_BR\CompanyTest;
use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        //
        $companies=Company::all();
        return view('company.all')->with(['companies'=>$companies]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $users=User::where('type','client')->lists('name','id');
//        dd($users);
        return view('company.create')->with(['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $company=new Company();
        $company->name=$request->get('name');
//        dd($request->input('owner_list'));
        $company->save();
        $company->owners()->sync($request->input('owner_list'));

        return redirect('company_per/cont/'.$company->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $company= Company::find($id);
        return view('company.show')->with(['company'=>$company]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $loggedInUser= auth::user();
        if($loggedInUser['type']=='admin') {
            $company = Company::findOrFail($id);
            $users=User::where('type','client')->lists('name','id');
            return view('company.edit')->with(['company' => $company,
                                               'users'=>$users]);
        }
        else{
            return view('errors.Unauth')->with(['msg'=>'You are Not Authorized to see this']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $loggedInUser= auth::user();
        if($loggedInUser['type']=='admin') {
            $company = Company::findOrFail($id);
            $company->name=$request->get('name');
            $company->save();
            $company->owners()->sync($request->get('owner_list'));


//            return view('company.show')->with(['company'=>$company]);
            return redirect('company_per/cont/'.$id);
//            return view('company.percentage')->with(['company'=>$company]);
        }
        else{
            return view('errors.Unauth')->with(['msg'=>'You are Not Authorized to see this']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        return view('errors.Unauth')->with(['msg'=>'Not Done yet']);
    }
    public function addPercentage($id)
    {
        $company=Company::findOrFail($id);
        return view('company.percentage')->with(['company'=>$company]);
    }
    public function storePercentage(Request $request,$id)
    {
        $company=Company::findOrFail($id);

        $data_user=[];
        foreach($company->owners as $user)
        {
            $data_user[$user->id]=
                    ['percentage'=>$request->get('user-'. $user->id)];


        }
//        dd($data_user);
        $company->owners()->sync($data_user);
        return redirect('company/'.$id);
    }
}
