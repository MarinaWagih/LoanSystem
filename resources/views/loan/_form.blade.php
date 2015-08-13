<div class="form-group">
    {!! Form::label('Company','Company:') !!}
    {!! Form::select('company_id',$companies,null,['class'=>'form-control','required'=>'true']) !!}
</div>

<div class="form-group">
    {!! Form::label('start_date','start date:') !!}
    {!! Form::input('date','start_date',date('Y-m-d'),['class'=>'form-control','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('due_date','due date:') !!}
    {!! Form::input('date','due_date',date('Y-m-d'),['class'=>'form-control','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('Quantity','Quantity:') !!}
    {!! Form::text('quantity',null,['class'=>'form-control','placeholder'=>'*write the amount of money like:10000','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('Benefits','Benefits:') !!}
    {!! Form::text('Benefits',10,['style'=>'width: 485px;height: 34px;','placeholder'=>'*write the percentage that taken over the amount of money over a year like:10','required'=>'true']) !!}
    <span float="left">%</span>
</div>

<div class="form-group">
    {!! Form::submit($submitText,['class'=>'btn btn-primary']) !!}
</div>

@foreach($errors as $error)
   <span class="danger"> {{ $error }} </span>
@endforeach