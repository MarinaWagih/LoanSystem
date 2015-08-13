@extends('app')
@section('title')
    {{$company->name}}
@stop
@section('content')

<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h1>Edit {{$company->name}} Info</h1>
    <hr>
    {!! Form::model($company,['url'=>'company/'.$company->id,'method'=>'PUT'])!!}
        @include('company._form',['submitText'=>'Update Company'])
    {!! Form::close()!!}
</div>
@stop