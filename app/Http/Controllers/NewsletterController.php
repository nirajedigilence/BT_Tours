<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailchimpService;

class NewsletterController extends Controller
{
    protected $mailchimp;

    public function __construct(MailchimpService $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {
            $this->mailchimp->subscribe($request->email);
            return back()->with('success', 'You have been subscribed!');
        } catch (\Exception $e) {
            //return back()->with('error', 'Error: ' . $e->getMessage());
            return back()->with('error', 'Already subscribed');
        }
    }
}