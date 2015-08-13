@extends('app')
@section('title')
	New client
@stop
@section('content')

<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h1>Add New client</h1>
    <hr>
    {!! Form::model($company=new App\Company,['url'=>'company'])!!}
        @include('company._form',['submitText'=>'add company'])
    {!! Form::close()!!}
</div>
@stop