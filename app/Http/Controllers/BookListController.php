<?php

namespace App\Http\Controllers;

use App\BookList;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BookListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List books in personal book list. Sort by customizable sort order
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bookList = BookList::all()->where('user_id', Auth::user()->id)->sortBy('sort_order');
        return view('list.index', compact('bookList'));
    }

    /**
     * Edit personal book list. Can change order and remove books from this page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manage()
    {
        $bookList = BookList::all()->where('user_id', Auth::user()->id)->sortBy('sort_order');
        return view('list.manage', compact('bookList'));
    }

    /**
     * Update sort order and remove books from personal book list
     */
    public function update()
    {
        print_r(Input::get());
        foreach (Input::get('book_list') as $key => $value) {
            $bookList = BookList::findOrFail($key);
            if ($bookList->user_id == Auth::user()->id) {
                if (empty($value['delete'])) {
                    $bookList->sort_order = $value['sort_order'];
                    $bookList->save();
                } else {
                    $bookList->delete();
                }
            }
        }
        return redirect('list');
    }
}
