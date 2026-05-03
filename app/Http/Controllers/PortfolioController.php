<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display all portfolio items on homepage
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('portfolio.index', compact('portfolios'));
    }

    /**
     * Show single portfolio item detail
     */
    public function show(Portfolio $portfolio)
    {
        return view('portfolio.show', compact('portfolio'));
    }

    /**
     * Show admin dashboard with all portfolios
     */
    public function dashboard()
    {
        $portfolios = Portfolio::all();
        return view('admin.dashboard', compact('portfolios'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store new portfolio item
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'category' => 'required|string',
            'technologies' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolio', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['slug'] = Str::slug($validated['title']);

        Portfolio::create($validated);

        return redirect()->route('portfolio.dashboard')->with('success', 'Portfolio item created successfully!');
    }

    /**
     * Show edit form
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.edit', compact('portfolio'));
    }

    /**
     * Update portfolio item
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'category' => 'required|string',
            'technologies' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolio', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $portfolio->update($validated);

        return redirect()->route('portfolio.dashboard')->with('success', 'Portfolio item updated successfully!');
    }

    /**
     * Delete portfolio item
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolio.dashboard')->with('success', 'Portfolio item deleted successfully!');
    }
}
