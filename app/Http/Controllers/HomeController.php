<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Contact;
use App\Models\Subscriber;
use App\Models\TeamMember;
use App\Models\Donation;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PartnershipRequest;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->orderBy('published_at', 'desc')->take(3)->get();
        $projects = Project::where('status', 'active')->take(4)->get();
        $events = Event::where('status', 'upcoming')->orderBy('event_date', 'asc')->take(3)->get();
        $partners = Partner::where('is_active', true)->orderBy('order', 'asc')->get();
        
        return view('home', compact('posts', 'projects', 'events', 'partners'));
    }

    public function about()
    {
        // Get only 3 active team members for the about page preview
        $teamMembers = TeamMember::where('is_active', true)->orderBy('order', 'asc')->take(3)->get();
        $allTeamMembers = TeamMember::where('is_active', true)->orderBy('order', 'asc')->get();
        $totalTeamMembers = TeamMember::where('is_active', true)->count();
        
        return view('about', compact('teamMembers', 'allTeamMembers', 'totalTeamMembers'));
    }

    public function team()
    {
        $teamMembers = TeamMember::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('team', compact('teamMembers'));
    }

    public function projects()
    {
        $projects = Project::paginate(9);
        return view('projects', compact('projects'));
    }

    public function singleProject($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('single-project', compact('project'));
    }

    public function research()
    {
        return view('research');
    }

    public function media()
    {
        return view('media');
    }

    public function events()
    {
        $events = Event::orderBy('event_date', 'asc')->paginate(9);
        return view('events', compact('events'));
    }

    public function blog(Request $request)
    {
        $query = Post::where('status', 'published');
        
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%')
                  ->orWhere('category', 'like', '%' . $search . '%');
            });
        }
        
        $posts = $query->orderBy('published_at', 'desc')->paginate(9);
        return view('blog', compact('posts'));
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('single-post', compact('post'));
    }

    public function partner()
    {
        return view('partner');
    }

    public function join()
    {
        return view('join');
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        Subscriber::create([
            'email' => $request->email,
            'is_active' => true,
            'subscribed_at' => now(),
        ]);

        return redirect()->back()->with('subscriber_success', 'Thank you for subscribing to our newsletter!');
    }

    public function donate()
    {
        return view('donate-simple');
    }

    public function submitDonation(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
        ]);

        // Save to database
        $donation = Donation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->route('donate')->with('donation_success', 'Thank you for your donation! We will contact you shortly.');
    }

    public function submitJoin(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        $volunteer = new Volunteer();
        $volunteer->name = $request->name;
        $volunteer->email = $request->email;
        $volunteer->phone = $request->phone;
        $volunteer->message = $request->message;
        $volunteer->save();

        return redirect()->route('join')->with('success', 'Thank you for your application! We will contact you soon.');
    }

   public function submitPartner(Request $request)
{
    $request->validate([
        'organization' => 'required|max:255',
        'contact_person' => 'required|max:255',
        'email' => 'required|email',
    ]);

    \App\Models\PartnershipRequest::create([
        'organization' => $request->organization,
        'contact_person' => $request->contact_person,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
        'status' => 'pending',
    ]);

    return redirect()->route('partner')->with('success', 'Thank you for your partnership request! We will contact you soon.');
}
}