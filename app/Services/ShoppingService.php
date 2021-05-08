<?php

namespace App\Services;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use DB;


class ShoppingService
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Product::select('id', 'category_id','product_name', 'description', 'price')
                ->where('is_deleted', 0)->with('category')->get()->groupBy('category_id');
    }


}
