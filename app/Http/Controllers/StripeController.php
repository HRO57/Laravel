<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StripeController extends Controller
{
    public function session(Request $request)
{
    //$user = auth()->user();
    $productItems = [];
 
    \Stripe\Stripe::setApiKey(config('stripe.sk'));
    
    foreach (session('cart') as $id => $details) {
        $product = \App\Models\Product::find($id); // Retrieve the product using its ID
        
        if ($product) {
            $product_name = $product->name;
            $total = $details['price'];
            $quantity = $details['quantity'];

            $two0 = "00";
            $unit_amount = "$total$two0";

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency'     => 'BDT',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        } else {
            echo "Product ID: $id | Product not found in database<br>";
        }
    }

    $checkoutSession = \Stripe\Checkout\Session::create([
        'line_items'            => [$productItems],
        'mode'                  => 'payment',
        'allow_promotion_codes' => true,
        'metadata'              => [
            'user_id' => "0001"
        ],
        'customer_email' => "cairocoders-ednalan@gmail.com", //$user->email,
        'success_url' => route('success'),
        'cancel_url'  => route('cancel'),
    ]);

    return redirect()->away($checkoutSession->url);
}

 
    public function success()
    {
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }
 
    public function cancel()
    {
        return view('products.cancel');
    }
}
