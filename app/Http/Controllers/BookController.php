<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\BookAuthor;
use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::get()->lists('full_name', 'id');
        return view('books.create', compact('authors'));
    }

    public function store()
    {
        $book = new Book;
        $book->title = Input::get('title');
        $book->publication_date = Input::get('publication_date');
        $book->save();
        $book->authors()->attach(Input::get('authors'));
        return Redirect::route('books.index');
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::get()->lists('full_name', 'id');
        return view('books.edit', compact('book', 'authors'));
    }

    public function update($id)
    {
        $book = Book::find($id);
        $book->title = Input::get('title');
        $book->publication_date = Input::get('publication_date');
        $book->save();
        if (!empty($authors = Input::get('authors'))) {
            $book->authors()->sync($authors);
        }
        return redirect()->action('BookController@show', ['id' => $id]);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return Redirect::route('books.index');
    }
    public function add($id) {
        $book = Book::find($id);
        $userID = Auth::user()->id;
        if (!$book->users->contains($userID)) {
            $book->users()->attach($userID);
        }
        return redirect('list');
    }
}
