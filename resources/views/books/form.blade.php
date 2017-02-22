<div class="form-group">
    {{ Form::label('title') }}
    {{Form::text('title')}}
</div>
<div class="form-group">
    {{ Form::label('publication_date') }}
    {{Form::date('publication_date')}}
</div>
<div class="form-group">
    {{Form::label('authors')}}
    {{Form::select('authors[]', $authors, null, ['multiple' => true])}}
</div>