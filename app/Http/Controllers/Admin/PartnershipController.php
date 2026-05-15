<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnershipRequest;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index()
    {
        $requests = PartnershipRequest::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.partnerships.index', compact('requests'));
    }

    public function show(PartnershipRequest $partnership)
    {
        return view('admin.partnerships.show', compact('partnership'));
    }

    public function update(Request $request, PartnershipRequest $partnership)
    {
        $partnership->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Partnership request updated!');
    }

    public function destroy(PartnershipRequest $partnership)
    {
        $partnership->delete();
        return redirect()->route('admin.partnerships')->with('success', 'Partnership request deleted!');
    }
}