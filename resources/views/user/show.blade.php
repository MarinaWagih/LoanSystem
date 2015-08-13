@extends('app')
@section('title')
    {{$user->name}}
@stop
@section('content')
    <div class="col-lg-3">
       <h2>
           <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            {{$user->name}}
       </h2>
            <h4>tel:{{$user->phone}}</h4>
            <h4>E-mail: {{$user->email}}</h4>
        <hr>
        <a href="/user/{{$user->id}}/edit"  class="btn-lg">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            Edit Info
        </a>

    </div>

    <div class="col-lg-7">
        <h1>
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            List Of Companies You have a share in
        </h1>
        <hr>
     @foreach($user->companies as $company)
         <div class="company-container">
            {{--<div class="row">--}}

                {{--<div class="col-md-4 col-md-offset-4">--}}
                    <h2>
                        <kbd>   {{$company->name}}</kbd>
                    </h2>
                {{--</div>--}}
            {{--</div>--}}

          <h3> Your share:{{$company->pivot->percentage}}%</h3>
        <div class="company-loans">
            <h2>List of loans for this Company:</h2>
            {{--<div class="label label-warning">--}}
                {{--*to see details of loan click Loan Amount title--}}
                {{--<span class="glyphicon glyphicon-hand-down"></span>--}}
            {{--</div>--}}
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
                    Benefit per Day:{{($loan->quantity*($loan->Benefits/100)/365)}}
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
                        ((\Carbon\Carbon::now()->diffInDays($loan->start_date))
                         *($loan->quantity*($loan->Benefits/100)/365))
                         +$loan->quantity- $loan->loanPaymentsSum()}}
                    </h4>
                </div>
                </div>
                <div class="panel-footer bg-warning">
                    <h3> left on you to pay:
                     {{(((\Carbon\Carbon::now()->diffInDays($loan->start_date))
                     *($loan->quantity*($loan->Benefits/100)/365))
                     +$loan->quantity- $loan->loanPaymentsSum())
                     *($company->pivot->percentage/100)}}
                    </h3>
                </div>
            </div>
        @endforeach
         </div>
    </div>
         <hr>
     @endforeach

</div>
    <div class="col-lg-2">

    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@stop