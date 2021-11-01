<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $fillable = [];

    public static function getProductImgList()
    {
        $rows = Products::select("product_images.product_id","product_images.name","product_images.image")
                        ->leftJoin("product_images", "product_images.product_id", "=", "products.id")
                        ->orderBy("product_images.created_at")
                        ->get();
        return $rows;
    }

    public static function getProductList()
    {
        $rows = Products::select("products.product_name","products.large_image")
                        ->orderBy("products.id")
                        ->get();
        return $rows;
    }

    public static function getProductWithCatList()
    {
        $rows = Products::select("products.product_name","products.small_image","categories.slug","products.product_desc","products.lable_one","products.lable_two","products.lable_three")
                        ->leftJoin("categories", "categories.id", "=", "products.product_category_id")
                        ->orderBy("categories.display_order")
                        ->get();
        return $rows;
    }

    public static function getProductImgByCat($category_id="")
    {
        $rows = Products::select("product_images.product_id","product_images.name","product_images.image","products.product_category_id")
                        ->where("products.product_category_id",$category_id)
                        ->leftJoin("product_images", "product_images.product_id", "=", "products.id")
                        ->orderBy("product_images.created_at")
                        ->get();
        return $rows;
    }
}
