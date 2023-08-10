<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index()
    {
        // Fetch products from the database
        $products = Product::all(); // This assumes you have a 'products' table in your database
        
        return view('products.landing-page', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
    
        $cart = session()->get('cart', []);
    
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "image" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
    
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }


            public function cart ()
            {
                return view('products.cart');
            }


            public function update(Request $request)
            {
                if($request->id && $request->quantity){
                    $cart = session()->get('cart');
                    $cart[$request->id]["quantity"] = $request->quantity;
                    session()->put('cart', $cart);
                    session()->flash('success', 'Cart successfully updated!');
                }
            }
            

            public function remove(Request $request)
            {
                if($request->id) {
                    $cart = session()->get('cart');
                    if(isset($cart[$request->id])) {
                        unset($cart[$request->id]);
                        session()->put('cart', $cart);
                    }
                        session()->flash('success', 'Product successfully removed!');
                }
            }


}
