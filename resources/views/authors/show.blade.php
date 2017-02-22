@extends('layouts.app')
@section('title', $author->full_name)
@section('content')

    <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Books</div>
                <div class="panel-body">
                    @foreach($author->books as $book)
                        <li><a href="{{ url('books/'. $book->id)  }}"> {{$book->title}} </a></li>
                    @endforeach
                </div>
            </div>
        </div>
@stop