<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('admin.subscribers')->with('success', 'Subscriber removed successfully!');
    }

    public function export()
    {
        $subscribers = Subscriber::where('is_active', true)->get();
        
        $filename = "subscribers_" . date('Y-m-d') . ".csv";
        $handle = fopen('php://output', 'w');
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        fputcsv($handle, ['Email', 'Subscribed Date', 'Status']);
        
        foreach ($subscribers as $subscriber) {
            fputcsv($handle, [
                $subscriber->email,
                $subscriber->created_at->format('Y-m-d H:i:s'),
                $subscriber->is_active ? 'Active' : 'Inactive'
            ]);
        }
        
        fclose($handle);
        exit;
    }
}