<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Author;
use Illuminate\Support\Facades\Input;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authors = Author::paginate(10);
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create', compact('suffixes'));
    }

    public function store()
    {
        $author = new Author;
        $author->first_name = Input::get('first_name');
        $author->last_name = Input::get('last_name');
        $author->suffix= Input::get('suffix');
        $author->save();
        return Redirect::route('authors.index');
    }

    public function show($id)
    {
        $author = Author::find($id);
        return view('authors.show', compact('author'));
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('authors.edit', compact('book', 'authors'));
    }

    public function update($id)
    {
        $author = Author::find($id);
        // todo
        $author->save();
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return Redirect::route('authors.index');
    }
}
