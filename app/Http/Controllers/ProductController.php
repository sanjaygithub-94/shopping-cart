<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use Response;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->index();
        $categorys = $this->productService->getCategories();

        return view('Product.list', compact('products', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->productService->store($request);
        if (!$create) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }

    /**
     * Product edit page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProduct($id)
    {
        return $this->productService->editProduct($id);
    }

    /**
     * Product update
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request)
    {
        $update = $this->productService->updateProduct($request->product_id);

        if (!$update) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        $delete = $this->productService->deleteProduct($id);

        if (!$delete) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }
}
