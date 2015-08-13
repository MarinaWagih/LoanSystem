@extends('app')
@section('title')
	All Clients
@stop
@section('content')
    <div class="col-lg-2">
        <a type="button" class="btn btn-info btn-lg btn-block" href="/user">

            <h1>
                <span class="glyphicon glyphicon-user"></span>
                <br>
                Users
            </h1>
        </a>
        <a type="button" class="btn btn-default btn-lg btn-block" href="/user/create">
            <span class="glyphicon glyphicon-plus"></span>
            Add
        </a>
    </div>
    <div class="col-lg-8">
<div class="panel panel-info">
	<div class="panel-heading">Clients in the system</div>

            @foreach($users as $user)
            <div  style="margin-left: 25px; margin-bottom: 25px;border-bottom: 1px solid black; margin-right: 25px;">
               <h2>
                   <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <a href="{{url('user',$user->id)}}">{{$user->name}} </a>
               </h2>
                <p>tel:{{$user->phone}}</p>
                <p>E-mail: {{$user->email}}</p>

                <a href="/user/{{$user->id}}/edit"  class="btn-lg">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>

                <a href="/user/{{$user->id}}/delete"  class="btn-lg">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>

            </div>
            @endforeach


</div>
    </div>
@stop