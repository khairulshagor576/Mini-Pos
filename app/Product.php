<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['category_id','title','description','cost_price','price'];

    public static function CategoryListArray()
    {
        $categories = Category::all();
        $category_arr=[];
        foreach ($categories as $row) 
        {
            $category_arr[$row['id']]=$row['title'];
        }

        return $category_arr;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
