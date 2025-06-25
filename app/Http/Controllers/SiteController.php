<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $featured = Sneaker::latest()->take(6)->get();
        return view('welcome', compact('featured'));
    }
    public function welcome()
    {
        return view('welcome', [
            'newArrivals' => Sneaker::latest()->take(6)->get(),
        
        ]);
    }

    public function brands()
    {
        $brands = Sneaker::select('brand')->distinct()->get();
        return view('brand', compact('brands'));
    }

    public function newArrivals()
    {
        $newSneakers = Sneaker::where('is_new', true)->latest()->get();
        return view('new-arrivals', compact('newSneakers'));
    }

    public function collections()
    {
        $sneakers = Sneaker::latest()->paginate(12);
        return view('collections', compact('sneakers'));
    }

    public function order($sneaker)
{
    $sneaker = Sneaker::findOrFail($sneaker);
    return view('order', compact('sneaker'));
}
    
    public function sendWhatsApp(Request $request)
    {
        // Logic to send WhatsApp message
        // This is a placeholder, implement your WhatsApp API logic here
        return back()->with('success', 'WhatsApp message sent successfully!');
    }

}
