@extends('app')
@section('title')
    All Companies
@stop
@section('content')
    <div class="col-lg-2">

    </div>
    <div class="col-lg-8">
<h1>{{$company->name}} Share holders</h1>
            {!! Form::open(['url'=>'company_per/cont/'.$company->id])!!}


            @foreach($company->owners as $user)
                <div class="input-group" style="margin-bottom: 10px">

                    <div class="input-group-addon">{{$user->name}}</div>
                    <input name="user-{{$user->id}}" type="number" class="form-control"
                           id="exampleInputAmount" placeholder="Amount"
                           value="{{$user->pivot->percentage}}">
                    <div class="input-group-addon">%</div>
                </div>
            @endforeach

        <div class="form-group">
            {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
        </div>
            {!! Form::close()!!}


    </div>
@stop