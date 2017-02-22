<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors')
            ->withTimestamps();
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'book_lists')
            ->withTimestamps();
    }
}
