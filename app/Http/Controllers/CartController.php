<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $whatsappNumber = Setting::get('whatsapp_number', '');
        $checkoutGreeting = Setting::get('checkout_greeting', 'Halo Kak, saya ingin order:');
        $checkoutClosing = Setting::get('checkout_closing', 'Mohon konfirmasi ketersediaan dan info pembayarannya ya Kak, terima kasih!');

        return view('cart.index', compact('whatsappNumber', 'checkoutGreeting', 'checkoutClosing'));
    }
}
