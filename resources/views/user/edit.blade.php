@extends('app')
@section('title')
    {{$user->name}}
@stop
@section('content')

<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h1>Edit {{$user->name}} Info</h1>
    <hr>
    {!! Form::model($user,['url'=>'user/'.$user->id,'method'=>'PUT'])!!}
        @include('user._form',['submitText'=>'Update client','isEdit'=>'true'])
    {!! Form::close()!!}
</div>
@stop