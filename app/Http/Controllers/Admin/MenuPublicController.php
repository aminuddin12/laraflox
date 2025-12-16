<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuPublic;
use Illuminate\Http\Request;

class MenuPublicController extends Controller
{

    public function index()
    {
        $menus = MenuPublic::with('children')->orderBy('group')->orderBy('order')->get();

        return view('admin.menus.public.index', compact('menus'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'group' => 'required|string|max:100',
            'type_group' => 'nullable|string|max:100',
            'parent_id' => 'nullable|exists:menu_publics,id',
            'icon' => 'nullable|string|max:100',
            'style' => 'nullable|array',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        MenuPublic::create($validated);

        return redirect()->back()->with('success', 'Menu created successfully.');
    }

    public function update(Request $request, MenuPublic $menuPublic)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'group' => 'required|string|max:100',
            'type_group' => 'nullable|string|max:100',
            'parent_id' => 'nullable|exists:menu_publics,id',
            'icon' => 'nullable|string|max:100',
            'style' => 'nullable|array', // Validasi input array untuk JSON
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $menuPublic->update($validated);

        return redirect()->back()->with('success', 'Menu updated successfully.');
    }

    public function destroy(MenuPublic $menuPublic)
    {
        $menuPublic->delete();

        return redirect()->back()->with('success', 'Menu deleted successfully.');
    }
}
