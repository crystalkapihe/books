@extends('layouts.app')
@section('title', 'Books')
@section('content')
    <ul>
        @foreach($books as $book)
            <li><a href="{{ url('books/'. $book->id)  }}"> {{$book->title}} </a></li>
        @endforeach
    </ul>
    {{$books->links()}}
@stop