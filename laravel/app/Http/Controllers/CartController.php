<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $products = $this->cartService->getProducts();
        return view('cart.cart', ['products' => $products, 'guest' => false]);
    }

    public function addToCart(Request $request)
    {
        $this->cartService->addToCart($request);
        return session()->flash('success', 'Product is Added to Cart Successfully !');
    }

    public function updateCart(Request $request)
    {
        $this->cartService->updateCart($request);
        return redirect()->route('shoppingCart');
    }

    public function removeCart(Request $request)
    {
        $this->cartService->removeCart($request);
        return redirect()->route('shoppingCart');
    }

    public function clearAllCart(Request $request)
    {
        $this->cartService->clearAllCart($request);
        return redirect()->route('shoppingCart');
    }
}
