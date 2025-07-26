<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function checkout($event_id)
{
    
    $event = Event::findOrFail($event_id);

    Stripe::setApiKey(config('services.stripe.secret'));

    $session = Session::create([
        'line_items' => [[
        'price_data' => [
        'currency' => 'egp',
        'product_data' => [
        'name' => $event->title,
        'description' => $event->description,
                ],
            'unit_amount' => $event->event_price * 100,
        ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('dashboard', ['success' => true, 'event_id' => $event_id]),
        'cancel_url' => route('dashboard', ['cancelled' => true]),
    ]);

    return redirect($session->url);
}
}
