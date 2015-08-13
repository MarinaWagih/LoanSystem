@extends('app')
@section('title')
	About
@stop
@section('content')

<div class="col-lg-2">
    Hello,{{Auth::user()->name}}

</div>

   <div class="col-lg-10">
       <div class="row" style="margin-top: 50px;">
       <div class="col-lg-6" >

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

       <div class="col-lg-6" >

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
       </div>

       <div class="row" style="margin-top: 50px;">
           <div class="col-lg-6" >

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

           <div class="col-lg-6" >

               <a type="button" class="btn btn-success btn-lg btn-block" href="/loan_payment">

                   <h1>
                       <span class="glyphicon glyphicon-ok"></span>
                       <br>
                       Payments
                   </h1>
               </a>
               <a type="button" class="btn btn-default btn-lg btn-block" href="/loan_payment/create">
                   <span class="glyphicon glyphicon-plus"></span>
                   Add
               </a>
           </div>
       </div >
   </div>


{{--<div class="col-lg-2"></div>--}}
@stop