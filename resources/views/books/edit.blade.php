@extends('layouts.app')
@section('title', $book->title)
@section('content')
    {{Form::model($book,['route' => ['books.update', $book->id], 'method' => 'put'])}}
    @include('books.form')
    {{Form::submit('Edit Book')}}
    {!! Form::close() !!}
@stop