@extends('layouts.app')
@section('title', 'Add New Boook')
@section('content')
    {!! Form::open(['route' => 'books.store']) !!}
    @include('books.form')
    {{Form::submit('Add Book')}}
    {!! Form::close() !!}
@stop