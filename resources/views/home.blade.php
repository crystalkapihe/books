@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Your Books</div>
            <div class="panel-body">
                <ul>
                    @foreach($user->books as $book)
                        <li><a href="{{ url('books/'. $book->id)  }}"> {{$book->title}} </a> </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
