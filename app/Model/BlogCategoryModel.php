<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BlogCategoryModel extends Model
{
     protected $table = 'blog_category';

   
    public $timestamps = true;
   
    protected $fillable = array('blog_id','category_id');
    
}
