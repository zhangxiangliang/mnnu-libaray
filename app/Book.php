<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'author', 'cover', 'published_company',
            'published_time', 'page', 'price', 'ISBN', 'content', 'author_intro', 'number',
            'category_id'];

    /*
     * Eloquent ORM
     * Relationships : 多对多关系，用于 book 和 comment 多表
     */
    public function comment(){
        return $this->belongsToMany('App\Comment', 'book_comment');
    }

    /*
     * Eloquent ORM
     * Relationships : 多对多关系，用于 book 和 user 多表
     */
    public function user(){
        return $this->belongsToMany('App\User', 'user_book');
    }

    /*
     * Eloquent ORM
     * Relationships : 一对一关系，用于 book 和 category 多表
     */
    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
