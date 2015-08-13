<div class="form-group">
    {!! Form::label('name','Client Name:') !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'*write client name here','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone','Client phone:') !!}
    {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'*write client phone here','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('email','Client email:') !!}
    {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'*write client e-mail here','required'=>'true']) !!}
</div>
@if($isEdit== 'false')
<div class="form-group">
    {!! Form::label('password','Client password:') !!}
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'*write client password here','required'=>'true']) !!}
</div>
@endif
<div class="form-group">
    {!! Form::submit($submitText,['class'=>'btn btn-primary']) !!}
</div>

@foreach($errors as $error)
   <span class="danger"> {{ $error }} </span>
@endforeach