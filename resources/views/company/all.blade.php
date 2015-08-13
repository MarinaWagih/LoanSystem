@extends('app')
@section('title')
	All Companies
@stop
@section('content')
    <div class="col-lg-2">
        <a type="button" class="btn btn-warning btn-lg btn-block" href="/company">

            <h1>
                <span class="glyphicon glyphicon-home"></span>
                <br>
                Companies
            </h1>
        </a>
        <a type="button" class="btn btn-default btn-lg btn-block" href="/company/create">
            <span class="glyphicon glyphicon-plus"></span>
            Add
        </a>
    </div>
    <div class="col-lg-8">
<div class="panel panel-warning">
	<div class="panel-heading">companies in the system</div>

            @foreach($companies as $company)
            <div  style="margin-left: 25px; margin-bottom: 25px;border-bottom: 1px solid black; margin-right: 25px;">
               <h2>
                   <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    <a href="{{url('company',$company->id)}}">{{$company->name}} </a>
               </h2>

                <a href="/company/{{$company->id}}/edit"  class="btn-lg">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>

                <a href="/company/{{$company->id}}/delete"  class="btn-lg">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>

            </div>
            @endforeach


</div>
    </div>
@stop