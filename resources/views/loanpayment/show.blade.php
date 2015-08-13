@extends('app')
@section('title')
    {{$loan_payment->loan->company->name}}
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
    <div class="col-lg-8" >
       <h2>
           <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            {{$loan_payment->loan->company->name}}
       </h2>
            <h3>Amount:{{$loan_payment->quantity}}</h3>

            <p>Date:{{$loan_payment->date}}</p>
        <hr>

    </div>


@stop