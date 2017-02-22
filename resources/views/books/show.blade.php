@extends('layouts.app')
@section('title', $book->title)
@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Published</div>
            <div class="panel-body">
                {{$book->publication_date}}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Authors</div>
            <div class="panel-body">
                <ul>
                    @foreach($book->authors as $author)
                        <li><a href="{{ url('authors/'. $author->id)  }}"> {{$author->full_name}} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Actions</div>
            <div class="panel-body">

                {!! Form::open(['method' => 'POST','url' => ['add', $book->id]]) !!}
                {!! Form::submit('Add to my list') !!}
                {!! Form::close() !!}

                {!! link_to_route('books.edit', 'Edit', [$book->id]) !!}
                {!! Form::open(['method' => 'DELETE','route' => ['books.destroy', $book->id]]) !!}
                {!! Form::submit('DELETE') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop