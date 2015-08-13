<?php

namespace App\Http\Controllers;

use App\Loan;
use App\LoanPayment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoanPaymentController extends Controller
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
        $loan_payments=LoanPayment::all();
        return view('loanpayment.all')->with(['loanPayments'=>$loan_payments]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $loans=Loan::lists('id','id');
//        dd($Companies);
        return view('loanpayment.create')->with(['loans'=>$loans]);

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
        $payment=new LoanPayment();
        $payment->loan_id=$request->get('loan_id');
        $payment->quantity=$request->get('quantity');
        $payment->date=$request->get('date');
        $payment->save();
        return redirect('loan/'.$payment->loan_id);

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
        $loan_payment= LoanPayment::findOrFail($id);
        return view('loanpayment.show')->with(['loan_payment'=>$loan_payment]);
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
        if($loggedInUser['type']=='admin')
        {
            $loan_payment = LoanPayment::findOrFail($id);
            $loans=LoanPayment::lists('id','id');
            return view('loanpayment.edit')->with(
                ['loan_payment' => $loan_payment,'loans'=>$loans]);
        }
        else
        {
            return view('errors.Unauth')->with(
                ['msg'=>'You are Not Authorized to see this']);
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
            $loan_payment = LoanPayment::findOrFail($id);
            $loan_payment->loan_id=$request->get('loan_id');
            $loan_payment->quantity=$request->get('quantity');
            $loan_payment->date=$request->get('date');
            $loan_payment->save();

            return view('loanpayment.show')->with(
                ['loan_payment'=>$loan_payment]);
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
        $deleted=LoanPayment::destroy($id);
        return view('errors.Unauth')->with(['msg'=>'deleted']);
    }
}
