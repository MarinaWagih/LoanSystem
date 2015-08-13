@extends('app')
@section('title')
    {{$loan->company->name}}
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
    <div class="col-lg-8" >
        <div class="row">
       <h2>
           <kbd>
            {{$loan->company->name}}
           </kbd>
       </h2>
        </div>
        <blockquote>
            <div class="row ">

                <div class="col-lg-2 btn-primary btn-lg btn-block">
                     {{--<h2 class="btn-primary btn-lg btn-block">--}}
                         <span class="glyphicon glyphicon-info-sign"></span>
                         Info:
                     {{--</h2>--}}
                </div>
                <div class="col-lg-5">
                <h3 >
                   <span class="text-info">Id: </span>
                     {{$loan->id}}
                </h3>
                <h3>
                    <span class="text-info">Amount:</span>
                    {{$loan->quantity}}
                </h3>
                <h3>
                    <span class="text-info"> Benefit per Day:</span>
                    {{round($loan->quantity*($loan->Benefits/100)/365,3)}}
                    </h3>
               </div>
                <div class="col-lg-5">
                <h3>
                     <span class="text-info">Benefits: </span>
                    {{$loan->Benefits}}%
                </h3>
                <h3>
                    <span class="text-info"> Start Date:</span>
                    {{$loan->start_date->format('d-M-Y')}}
                </h3>

                <h3>
                    <span class="text-info"> due Date:</span>
                    {{ $loan->due_date ->format('d-M-Y')}}
                </h3>
                </div>
           </div>
        </blockquote>
            <hr>
        <blockquote>
        <div class="row">
            <div class="label label-warning">
                *to see details of loan click Loan Amount title
                <span class="glyphicon glyphicon-hand-down"></span>
            </div>
            <div class="panel panel-success">
                <div class="collapsed btn-success btn-lg btn-block" id="heading{{$loan->id}}"
                     data-toggle="collapse" data-parent="#accordion"
                     href="#collapse{{$loan->id}}" aria-expanded="false"
                     aria-controls="collapse{{$loan->id}}"
                     role="button">
                    {{--<div class="col-lg-2 btn-success btn-lg btn-block">--}}
                        <h3 >
                            <span class="glyphicon glyphicon-ok"></span>
                            Payments:
                        </h3>
                    {{--</div>--}}
                </div>
                <div id="collapse{{$loan->id}}" class="panel-collapse collapse"
                     role="tabpanel" aria-labelledby="heading{{$loan->id}}">
                    @unless($loan->loanPayments->isEmpty())

                        @foreach($loan->loanPayments as $payment)
                            <div class="row">
                                <div class="col-lg-10">
                                <h4>Amount:{{$payment->quantity}}</h4>
                                <h4>Date:{{$payment->date}}</h4>

                                </div>
                                <div class="col-lg-1">
                                    <a href="/loan_payment/{{$payment->id}}/edit"  class="btn-lg">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <div class="col-lg-1">

                                    <a href="/loan_payment/{{$payment->id}}/delete"  class="btn-lg">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <span class="text-danger">
                                No Payment Till Now
                            </span>
                        @endunless
                </div>
            </div>


        </div>

        </blockquote>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <h3>
                    <span class="text-danger"> Total Payment: </span>
                    <br>
                    {{$loan->loanPaymentsSum()}}
                </h3>
            </div>

            <div class="col-lg-4">
                <h3>
                  <span class="text-danger">  The Benefits Till now:</span>
                    {{
                   round((\Carbon\Carbon::now()->diffInDays($loan->start_date))
                         *($loan->quantity*($loan->Benefits/100)/365),3)
                        }}
                </h3>
            </div>

            <div class="col-lg-4">
                <h3>
                    <span class="text-danger">  Left to pay:</span>
                    {{
            ((\Carbon\Carbon::now()->diffInDays($loan->start_date))
             *($loan->quantity*($loan->Benefits/100)/365))
             +$loan->quantity- $loan->loanPaymentsSum()}}
                </h3>
           </div>
        </div>


    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@stop