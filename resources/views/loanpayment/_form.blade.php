<div class="form-group">
    {!! Form::label('Loan','Loan:') !!}
    {!! Form::select('loan_id',$loans,null,['class'=>'form-control','required'=>'true']) !!}
</div>

<div class="form-group">
    {!! Form::label('date','date:') !!}
    {!! Form::input('date','date',date('Y-m-d'),['class'=>'form-control','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('Quantity','Quantity:') !!}
    {!! Form::text('quantity',null,['class'=>'form-control','placeholder'=>'*write the amount of money like:10000','required'=>'true']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitText,['class'=>'btn btn-primary']) !!}
</div>

@foreach($errors as $error)
   <span class="danger"> {{ $error }} </span>
@endforeach