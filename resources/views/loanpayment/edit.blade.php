@extends('app')
@section('title')
    {{$loan_payment->loan->company->name}}
@stop
@section('content')

<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h1>Edit Payment fot:{{$loan_payment->loan->company->name}} Info</h1>
    <h2>Payment Id is: {{$loan_payment->id}}</h2>
    <hr>
    {!! Form::model($loan_payment,['url'=>'loan_payment/'.$loan_payment->id,'method'=>'PUT'])!!}
        @include('loanpayment._form',['submitText'=>'Update payment'])
    {!! Form::close()!!}
</div>
@stop