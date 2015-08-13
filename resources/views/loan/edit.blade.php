@extends('app')
@section('title')
    {{$loan->company->name}}
@stop
@section('content')

<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h1>Edit {{$loan->company->name}} Info</h1>
    <hr>
    {!! Form::model($loan,['url'=>'loan/'.$loan->id,'method'=>'PUT'])!!}
        @include('loan._form',['submitText'=>'Update Loan'])
    {!! Form::close()!!}
</div>
@stop