<?php

namespace App\Http\Controllers;
use App\Services\ShoppingService;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Session;

class ShoppingController extends Controller
{
    protected $shoppingService;

    public function __construct(ShoppingService $shoppingService)
    {
        $this->shoppingService = $shoppingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->shoppingService->index();

        return view('Shop.list', compact('products'));
    }

    /**
     * Add the product to the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect('shopping');
    }

    /**
     * Get cart items
     *
     * @return \Illuminate\Http\Response
     */
    public function getCartItems()
    {
        if (!Session::has('cart')) {
            return view('Cart.list');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('Cart.list', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * Checkout products
     *
     * @return \Illuminate\Http\Response
     */
    public function checkoutProducts()
    {
        if (!Session::has('cart')) {
            return view('Cart.list');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Session::forget('cart');
        $products = $this->shoppingService->index();

        return view('Shop.list', compact('products'));
    }
}
