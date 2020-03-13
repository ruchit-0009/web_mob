<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model {

    protected $table = 'blog';
    public $timestamps = true;
    protected $fillable = array('title', 'description');

}
