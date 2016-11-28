<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'color', 'updated_at', 'created_at'];

    /*
     * Eloquent ORM
     * Relationships : 一对多关系，用于 book 和 category 多表
     */
    public function book()
    {
        return $this->hasMany('App\Book');
    }
}
