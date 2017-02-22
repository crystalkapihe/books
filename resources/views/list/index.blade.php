@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Your Books
                <a href="{{ url('manage')  }}"> Manage </a></div>
            <div class="panel-body">
                <table>
                    <thead>
                    <tr>
                        <td>Title</td>
                        <td>Authors</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookList as $list)
                        <tr>
                            <td><a href="{{ url('books/'. $list->book->id)  }}"> {{$list->book->title}} </a></td>
                            <td>
                                <ul>@foreach(($list->book->authors) as $author)
                                        <li><a href="{{ url('authors/'. $author->id)  }}"> {{$author->full_name}} </a>
                                        </li>
                                    @endforeach</ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
