@extends('app')
@section('title')
	All Loans
@stop
@section('content')
    <div class="col-lg-2">
        <a type="button" class="btn btn-danger btn-lg btn-block" href="/loan">

            <h1>
                <span class="glyphicon glyphicon-usd"></span>
                <br>
                Loans
            </h1>
        </a>
        <a type="button" class="btn btn-default btn-lg btn-block" href="/loan/create">
            <span class="glyphicon glyphicon-plus"></span>
            Add
        </a>
    </div>
    <div class="col-lg-8">
<div class="panel panel-danger">
	<div class="panel-heading">Loans in the system</div>

            @foreach($loans as $loan)
            <div  style="margin-left: 25px; margin-bottom: 25px;border-bottom: 1px solid black; margin-right: 25px;">
               <h2>
                   <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                    <a href="{{url('loan',$loan->id)}}">{{$loan->Company->name}} </a>
               </h2>
                <p>Id:{{$loan->id}}</p>
                <p>Amount:{{$loan->quantity}}</p>
                <p>benefit: {{$loan->Benefits}}%</p>

                <a href="/loan/{{$loan->id}}/edit"  class="btn-lg">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>

                <a href="/loan/{{$loan->id}}/delete"  class="btn-lg">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>

            </div>
            @endforeach


</div>
    </div>
@stop