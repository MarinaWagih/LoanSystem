@extends('app')
@section('title')
	New client
@stop
@section('content')

<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h1>Add New client</h1>
    <hr>
    {!! Form::open(['url'=>'user'])!!}
        @include('user._form',['submitText'=>'add client','isEdit'=>'false'])
    {!! Form::close()!!}
</div>
@stop