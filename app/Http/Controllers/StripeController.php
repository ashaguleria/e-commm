<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Customer;
use Stripe\paymentIntent;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe');
    }
    public function checkout(Request $request)
    {
        // dd(config(Stripe::setApiKey(config('services')['stripe']['secret'])));
        Stripe::setApiKey(config('services')['stripe']['secret']);

        $customer = Customer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => [
                'line1' => 'mohali tower',
                'postal_code' => '160055',
                'city' => 'mohali',
                'state' => 'punjab',
                'country' => 'India',
            ],
        ]);

        $source = Customer::createSource(
            $customer->id,
            ['source' => $request['stripeToken']]
        );

        $charge = paymentIntent::create([
            "customer" => $customer->id,
            'setup_future_usage' => 'off_session',
            "amount" => $request['price'] * 100,
            "currency" => "usd",
            "description" => " orders booking Payment.",
            'automatic_payment_methods' => [
                'enabled' => 'true',
            ],
        ]);

        // dd($charge);
        // return $charge;
        return redirect()->back()->with('message', 'Payment  Successfully!');

    }
}