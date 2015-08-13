@extends('app')
@section('title')
	New Payment
@stop
@section('content')

<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h1>Add New Payment</h1>
    <hr>
    {!! Form::open(['url'=>'loan_payment'])!!}
        @include('loanpayment._form',['submitText'=>'add Payment'])
    {!! Form::close()!!}
</div>
@stop