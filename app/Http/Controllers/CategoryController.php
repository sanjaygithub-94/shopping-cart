<?php

namespace App\Http\Controllers;
use App\Services\CategoryService;

use Illuminate\Http\Request;
use Response;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService) 
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->index();
   
        return view('Category.list', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->categoryService->store($request);
        if (!$create) return abort(500, 'Whoops, looks like something went wrong');
        
        return Response::json(['success' => '1']);
    }

    /**
     * Category edit page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        return $this->categoryService->editCategory($id);
    }

    /**
     * Category update
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request)
    {
        $update = $this->categoryService->updateCategory($request->category_id);
        
        if (!$update) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $delete = $this->categoryService->deleteCategory($id);
  
        if (!$delete) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }
}
