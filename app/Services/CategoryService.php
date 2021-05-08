<?php

namespace App\Services;
use App\Models\Category;
use Carbon\Carbon;


class CategoryService
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        return Category::create(request()->only([
            'category_name'
        ]));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::select('id', 'category_name')->where('is_deleted', 0)->get();
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function editCategory($id)
    {
        return Category::select('id', 'category_name')->where('id', $id)->first();
    }

    /*
     * Update the specified resource in storage.
     */
    public function updateCategory($id)
    {
        return Category::where('id', $id)->update(request()->only([
            'category_name'
        ]));
    }

    /*
     * Update the specified resource in storage.
     */
    public function deleteCategory($id)
    {
        return Category::where('id', $id)->update(['is_deleted' => 1]);
    }

}