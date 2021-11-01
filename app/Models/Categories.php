<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $table = "categories";
    public $timestamps = false;
    protected $fillable = [];

    public function productCategory()
    {
        return $this->belongsTo('App\Models\Products', 'product_category_id');
    }

    public static function getProductCategoryList()
    {
        $rows = Categories::select("categories.category_name","categories.id","categories.slug")
                        ->Join("products", "products.product_category_id", "=", "categories.id")
                        ->orderBy("categories.display_order")
                        ->get();
        return $rows;
    }
}
