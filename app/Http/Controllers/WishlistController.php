<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session()->get('wishlist', []);
        return view('wishlist', compact('wishlist'));
    }

    public function add(Request $request)
{
    $product = [
        'id' => $request->product_id,
        'title' => $request->title,
        'image_url' => $request->image_url,
        'price' => $request->price,
    ];

    $wishlist = session()->get('wishlist', []);
    $wishlist[$request->product_id] = $product;

    session()->put('wishlist', $wishlist);
    session()->flash('wishlist_added', true);
    session()->flash('last_added', $request->product_id);

    return redirect()->back();
}


public function removeByRequest(Request $request)
{
    $wishlist = session()->get('wishlist', []);
    $id = $request->product_id;

    if (isset($wishlist[$id])) {
        unset($wishlist[$id]);
        session(['wishlist' => $wishlist]);
    }

    return back()->with('success', 'Removed from wishlist.');
}

public function remove($id)
{
    $wishlist = session()->get('wishlist', []);
    if (isset($wishlist[$id])) {
        unset($wishlist[$id]);
        session()->put('wishlist', $wishlist);
    }

    return back()->with('success', 'Item removed from wishlist.');
}

}
