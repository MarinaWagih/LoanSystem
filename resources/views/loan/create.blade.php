@extends('app')
@section('title')
	New Loan
@stop
@section('content')

<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h1>Add New Loan</h1>
    <hr>
    {!! Form::open(['url'=>'loan'])!!}
        @include('loan._form',['submitText'=>'add loan'])
    {!! Form::close()!!}
</div>
@stop