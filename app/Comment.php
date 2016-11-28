<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content'];
    /*
     * Eloquent ORM
     * Relationships : 多对多关系，用于 comment 和 user 多表
     */
    public function user() {
        return $this->belongsToMany('App\User', 'user_comment');
    }

    /*
     * Eloquent ORM
     * Relationships : 多对多关系，用于 comment 和 book 多表
     */
    public function book() {
        return $this->belongsToMany('App\Book', 'book_comment');
    }

}
