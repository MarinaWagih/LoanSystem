@extends('app')
@section('title')
	All Loans
@stop
@section('content')
    <div class="col-lg-2">
        <a type="button" class="btn btn-success btn-lg btn-block" href="/loan_payment">

            <h1>
                <span class="glyphicon glyphicon-ok"></span>
                <br>
                Payments
            </h1>
        </a>
        <a type="button" class="btn btn-default btn-lg btn-block" href="/loan_payment/create">
            <span class="glyphicon glyphicon-plus"></span>
            Add
        </a>
    </div>
    <div class="col-lg-8">
        <div class="panel panel-success">
	<div class="panel-heading">Loan Payments in the system</div>

            @foreach($loanPayments as $payment)
            <div style="margin-left: 25px; margin-bottom: 25px;border-bottom: 1px solid black; margin-right: 25px;">
               <h2>
                   <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                    <a href="{{url('loan_payment',$payment->id)}}">{{$payment->id}} </a>
               </h2>
                <h3>Form:
                    <a href="/company/{{$payment->loan->Company->id}}">
                    {{$payment->loan->Company->name}}
                    </a>
                </h3>
                <h3>Amount:{{$payment->quantity}}</h3>
                <h3>date: {{$payment->date}}%</h3>

                <a href="/loan_payment/{{$payment->id}}/edit"  class="btn-lg">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>

                <a href="/loan_payment/{{$payment->id}}/delete"  class="btn-lg">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>

            </div>
            @endforeach

</div>
    </div>
@stop