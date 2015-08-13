<?php

namespace App\Http\Controllers;

use App\Company;
use App\Loan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
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
        $loans=Loan::all();
        return view('loan.all')->with(['loans'=>$loans]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $Companies=Company::lists('name','id');
//        dd($Companies);
        return view('loan.create')->with(['companies'=>$Companies]);
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
//        dd($request);
        $loan=new Loan();
        $loan->company_id=$request->get('company_id');
        $loan->quantity=$request->get('quantity');
        $loan->start_date=$request->get('start_date');
        $loan->due_date=$request->get('due_date');
        $loan->Benefits=$request->get('Benefits');
        $loan->save();
        return redirect('loan');
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
        $loan= Loan::find($id);
        return view('loan.show')->with(['loan'=>$loan]);
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
            $loan = Loan::findOrFail($id);
            $Companies=Company::lists('name','id');
//        dd($Companies);

            return view('loan.edit')->with(['loan' => $loan,'companies'=>$Companies]);
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
            $loan = Loan::findOrFail($id);
            $loan->company_id=$request->get('company_id');
            $loan->quantity=$request->get('quantity');
            $loan->start_date=$request->get('start_date');
            $loan->due_date=$request->get('due_date');
            $loan->Benefits=$request->get('Benefits');
            $loan->save();

            return view('loan.show')->with(['loan'=>$loan]);
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
        $deleted=Loan::destroy($id);
        return view('errors.Unauth')->with(['msg'=>'deleted']);
    }
}
