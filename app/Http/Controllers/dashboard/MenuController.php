<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard.pages.menu.index', compact('menus'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('dashboard.pages.menu.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = $imagePath;
        }

        // dd($validatedData);
        Menu::create($validatedData);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('dashboard.pages.menu.edit', compact('menu'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($menu->image) {
                Storage::delete($menu->image);
            }
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = $imagePath;
        }

        $menu->update($validatedData);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diupdate.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->image) {
            Storage::delete($menu->image);
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
