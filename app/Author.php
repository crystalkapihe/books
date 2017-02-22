<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function getFullNameAttribute() {
        return $this->last_name . ', ' .$this->first_name . ' ' . $this->suffix;
    }
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors')
            ->withTimestamps();
    }
}
