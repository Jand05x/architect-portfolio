<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        $featured = Project::where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('featured'));
    }

    public function about()
    {
        return view('projects.about');
    }

    public function contact()
    {
        return view('projects.contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->to(config('mail.from.address', 'info@artofex.com'))
                ->subject('Contact Form: ' . $validated['name'])
                ->replyTo($validated['email'], $validated['name']);
        });

        return back()->with('success', 'Thanks — your message has been sent.');
    }
}