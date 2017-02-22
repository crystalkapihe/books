@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'manage']) !!}
    <table>
        <thead>
        <tr>
            <td>Title</td>
            <td>Sort</td>
            <td>Remove</td>
        </tr>
        </thead>
        <tbody>
        @foreach($bookList as $list)
            <tr>
                <td>{{$list->book->title}}</td>
                <td>{{Form::number("book_list[$list->id][sort_order]", $list->sort_order)}}</td>
                <td>{{Form::checkbox("book_list[$list->id][delete]")}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{Form::submit('Update List')}}
    {!! Form::close() !!}
@endsection
