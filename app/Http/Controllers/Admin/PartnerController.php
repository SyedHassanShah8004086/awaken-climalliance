<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order', 'asc')->orderBy('name', 'asc')->paginate(10);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        'website' => 'nullable|url',
    ]);

    $logoPath = null;
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
        $destinationPath = public_path('project-images');
        
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        
        $file->move($destinationPath, $filename);
        $logoPath = 'project-images/' . $filename;
        
        // Debug: Log the path
        \Log::info('Partner logo saved at: ' . $logoPath);
    }

    $partner = Partner::create([
        'name' => $request->name,
        'logo' => $logoPath,
        'website' => $request->website,
        'description' => $request->description,
        'order' => $request->order ?? 0,
        'is_active' => $request->is_active ?? true,
    ]);

    return redirect()->route('partners.index')->with('success', 'Partner added successfully!');
}

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
{
    $request->validate([
        'name' => 'required|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        'website' => 'nullable|url',
    ]);

    $data = [
        'name' => $request->name,
        'website' => $request->website,
        'description' => $request->description,
        'order' => $request->order ?? 0,
        'is_active' => $request->is_active ?? true,
    ];

    // Handle image upload for UPDATE
    if ($request->hasFile('logo')) {
        // Delete old logo if exists
        if ($partner->logo && file_exists(public_path($partner->logo))) {
            unlink(public_path($partner->logo));
        }
        
        $file = $request->file('logo');
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
        $destinationPath = public_path('project-images');
        
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        
        $file->move($destinationPath, $filename);
        $data['logo'] = 'project-images/' . $filename;
    }

    $partner->update($data);

    return redirect()->route('partners.index')->with('success', 'Partner updated successfully!');
}

    public function destroy(Partner $partner)
    {
        // Delete logo file
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }
        
        $partner->delete();
        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully!');
    }
}