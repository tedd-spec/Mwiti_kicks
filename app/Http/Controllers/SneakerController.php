<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use Illuminate\Http\Request;

class SneakerController extends Controller
{
    // Admin index
    public function index()
    {
        $sneakers = Sneaker::latest()->get();
        return view('admin.sneakers.index', compact('sneakers'));
    }

    // Show create form
    public function create()
    {
        return view('admin.sneakers.create');
    }

    // Store new sneaker
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'brand' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('sneakers', 'public');

        Sneaker::create([
            'title' => $request->title,
            'brand' => $request->brand,
            'size' => $request->size,
            'price' => $request->price,
            'is_new' => $request->has('is_new'),
            'image_url' => 'storage/' . $path,
        ]);

        return redirect()->route('admin.sneakers.index')->with('success', 'Sneaker added.');
    }

    // Edit sneaker
    public function edit($id)
    {
        $sneaker = Sneaker::findOrFail($id);
        return view('admin.sneakers.edit', compact('sneaker'));
    }

    // Update sneaker
    public function update(Request $request, $id)
    {
        $sneaker = Sneaker::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'brand' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sneakers', 'public');
            $sneaker->image_url = 'storage/' . $path;
        }

        $sneaker->update([
            'title' => $request->title,
            'brand' => $request->brand,
            'size' => $request->size,
            'price' => $request->price,
            'is_new' => $request->has('is_new'),
        ]);

        return redirect()->route('admin.sneakers.index')->with('success', 'Sneaker updated.');
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Sneaker::where('name', 'like', "%{$query}%")
                          ->orWhere('description', 'like', "%{$query}%")
                          ->get();

        return view('search-results', compact('results', 'query'));
    }

    public function show($id)
    {
        $sneaker = Sneaker::findOrFail($id);
        return view('sneakers.show', compact('sneaker'));
    }
    // Delete sneaker
    public function destroy($id)
    {
        $sneaker = Sneaker::findOrFail($id);
        $sneaker->delete();
        return redirect()->route('admin.sneakers.index')->with('success', 'Sneaker deleted.');
    }

    // Show a sneaker for ordering
    public function order($id)
    {
        $sneaker = Sneaker::findOrFail($id);
        return view('order', compact('sneaker'));
    }

    // FRONTEND: New Arrivals
    public function newArrivals()
    {
        $sneakers = Sneaker::where('is_new', true)->latest()->get();
        return view('new-arrivals', compact('sneakers'));
    }
}