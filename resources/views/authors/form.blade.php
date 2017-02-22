<div class="form-group">
    {{ Form::label('first_name') }}
    {{Form::text('first_name')}}
</div>
<div class="form-group">
    {{ Form::label('last_name') }}
    {{Form::text('last_name')}}
</div>
<div class="form-group">
    {{ Form::label('suffix') }}

    {{Form::select('suffix', array_combine($suffixes = ['', 'Jr.', 'Sr.', 'I', 'II', 'III', 'IV', 'V', 'VI'], $suffixes))}}
</div>