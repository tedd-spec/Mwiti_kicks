<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function send(Request $request)
{
    $message = "Sneaker Order:\n" .
               "Name: {$request->name}\n" .
               "ID: {$request->id_number}\n" .
               "Sneaker: {$request->sneaker_name}\n" .
               "Color: {$request->color}\n" .
               "Size: {$request->size}\n" .
               "Quantity: {$request->quantity}\n" .
               "Location: {$request->location}";

    $whatsapp = '254785857600'; // your business number
    return redirect('https://wa.me/' . $whatsapp . '?text=' . urlencode($message));
}

}

