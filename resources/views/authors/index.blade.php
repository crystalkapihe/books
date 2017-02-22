@extends('layouts.app')
@section('title', 'Authors')
@section('content')
    <ul>
        @foreach($authors as $author)
            <li><a href="{{ url('authors/'. $author->id)  }}"> {{$author->full_name}} </a></li>
        @endforeach
    </ul>
    {{$authors->links()}}
@stop