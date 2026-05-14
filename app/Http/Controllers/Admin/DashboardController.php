<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Subscriber;
use App\Models\Partner;
use App\Models\Donation;
use App\Models\TeamMember;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Admin check
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized access. Admin only.');
        }
        
        $totalPosts = Post::count();
        $totalProjects = Project::count();
        $totalEvents = Event::count();
        $totalContacts = Contact::count();
        $totalSubscribers = Subscriber::count();
        $totalPartners = Partner::where('is_active', true)->count();
        $totalDonations = Donation::count();
        $totalDonationAmount = Donation::sum('amount');
        $totalTeamMembers = TeamMember::where('is_active', true)->count();
        $totalVolunteers = Volunteer::count();
        
        return view('admin.dashboard', compact(
            'totalPosts', 'totalProjects', 'totalEvents', 
            'totalContacts', 'totalSubscribers', 'totalPartners',
            'totalDonations', 'totalDonationAmount', 'totalTeamMembers',
            'totalVolunteers'
        ));
    }
}