@extends('layouts.app')
@section('title', 'Add New Author')
@section('content')
    {!! Form::open(['route' => 'authors.store']) !!}
    @include('authors.form')
    {{Form::submit('Add Author')}}
    {!! Form::close() !!}
@stop