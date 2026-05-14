<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.quotes.index', compact('quotes'));
    }

    public function create()
    {
        return view('admin.quotes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'quote' => 'required',
            'author' => 'nullable|max:255',
        ]);

        Quote::create($request->all());
        return redirect()->route('admin.quotes')->with('success', 'Quote added successfully!');
    }

    public function edit(Quote $quote)
    {
        return view('admin.quotes.edit', compact('quote'));
    }

    public function update(Request $request, Quote $quote)
    {
        $request->validate([
            'quote' => 'required',
            'author' => 'nullable|max:255',
        ]);

        $quote->update($request->all());
        return redirect()->route('admin.quotes')->with('success', 'Quote updated successfully!');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('admin.quotes')->with('success', 'Quote deleted successfully!');
    }
}