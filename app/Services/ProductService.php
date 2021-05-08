<?php

namespace App\Services;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use DB;


class ProductService
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        return Product::create(request()->only([
            'category_id','product_name','description','price'
        ]));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::select('id', 'category_id','product_name','description','price')
                ->where('is_deleted', 0)->with('category')->get();
    }

    /**
     * Display a listing of the category.
     */
    public function getCategories()
    {
        return Category::select('id', 'category_name')->where('is_deleted', 0)->get()->toArray();
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function editProduct($id)
    {
        return Product::select('id', 'category_id','product_name','description','price')
                            ->where('is_deleted', 0)->with('category')
                            ->where('id', $id)->first();
    }

    /*
     * Update the specified resource in storage.
     */
    public function updateProduct($id)
    {
        return Product::where('id', $id)->update(request()->only([
            'category_id','product_name','description','price'
        ]));
    }

    /*
     * Update the specified resource in storage.
     */
    public function deleteProduct($id)
    {
        return Product::where('id', $id)->update(['is_deleted' => 1]);
    }
}
