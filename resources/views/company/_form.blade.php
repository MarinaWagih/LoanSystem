<div class="form-group">
    {!! Form::label('name','Client Name:') !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'*write client name here','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('owner_list','Owners:') !!}
    {!! Form::select('owner_list[]',$users,$company->owner_list(),['class'=>'form-control','required'=>'true','multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitText,['class'=>'btn btn-primary']) !!}
</div>
{{$company->owner_list()}}