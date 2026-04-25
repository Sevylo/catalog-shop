<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
        $settings = Setting::where('group', 'contact')->pluck('value', 'key')->toArray();
        $storeName = Setting::get('store_name', 'Toko Kami');
        $storeDescription = Setting::get('store_description', '');

        return view('pages.contact', compact('settings', 'storeName', 'storeDescription'));
    }
}
