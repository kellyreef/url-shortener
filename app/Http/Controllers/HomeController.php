<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;

class HomeController extends Controller
{
    /**
     * Returns the home page view.
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Redirects the shortened link to the destination link.
     * 
     * @param Request $request
     * @param String $slug The slug of the shortened link to find.
     * @return Illuminate\Routing\Redirector Redirect to the destination link.
     */
    public function redirect(Request $request, $slug)
    {
        $shortLink = ShortLink::where('slug', $slug)->first();
        // If the short link doesn't exist then return a 404 not found.
        if (!$shortLink) {
            abort(404);
        }
        // Increment how many times a link has been clicked.
        $shortLink->increment('clicks');
        return redirect()->to($shortLink->destination);
    }
}
