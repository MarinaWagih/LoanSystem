@extends('app')
@section('title')
    {{$company->name}}
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
       <h2>
           <kbd>{{$company->name}}</kbd>
       </h2>
        <hr>
        <div class="row">
            <div class="col-lg-2">
                <h3>
                    Owners:
                </h3>
            </div>

            <div class="col-lg-10">
                @foreach($company->owners as $user)
                    <h3>
                        <a href="/user/{{$user->id}}">{{$user->name}}</a>
                        with share {{$user->pivot->percentage}}
                    </h3>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-2">
                <h3>
                    Loans:
                </h3>
            </div>

            <div class="col-lg-10">
                @foreach($company->loans as $loan)
                    <div class="label label-warning">
                        *to see details of loan click Loan Amount title
                        <span class="glyphicon glyphicon-hand-down"></span>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading collapsed" id="heading{{$loan->id}}"
                             data-toggle="collapse" data-parent="#accordion"
                             href="#collapse{{$loan->id}}" aria-expanded="false"
                             aria-controls="collapse{{$loan->id}}"
                             class="collapsed"
                             role="button">
                            <h3> Amount: {{$loan->quantity}}</h3>
                        </div>
                        <div id="collapse{{$loan->id}}" class="panel-collapse collapse"
                             role="tabpanel" aria-labelledby="heading{{$loan->id}}">
                            <div class="panel-body" >

                                Id:{{$loan->id}}
                                <br>
                                Benefit per Day:{{round($loan->quantity*($loan->Benefits/100)/365,3)}}
                                <br>
                                Benefits: {{$loan->Benefits}}%
                                <br>
                                Start Date:{{$loan->start_date}}
                                <br>
                                due Date:{{ $loan->due_date }}
                                <hr>

                                <h4>Total Payment: {{$loan->loanPaymentsSum()}}</h4>

                                <h4>the Benefits Till now: {{
                        (\Carbon\Carbon::now()->diffInDays($loan->start_date))
                        *($loan->quantity*($loan->Benefits/100)/365)}}
                                </h4>
                                <hr>
                                <h4> Left to pay: {{
                        round((\Carbon\Carbon::now()->diffInDays($loan->start_date)
                         *($loan->quantity*($loan->Benefits/100)/365)),3)
                         +$loan->quantity- $loan->loanPaymentsSum()}}
                                </h4>
                            </div>
                        </div>
                        <div class="panel-footer bg-warning">
                            <h3> left on you to pay:
                                {{(round(((\Carbon\Carbon::now()->diffInDays($loan->start_date))
                                *($loan->quantity*($loan->Benefits/100)/365)),3)
                                +$loan->quantity- $loan->loanPaymentsSum())
                               }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


@stop