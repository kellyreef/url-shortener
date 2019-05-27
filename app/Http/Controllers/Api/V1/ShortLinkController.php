<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\ShortLink;
use Validator;

class ShortLinkController extends Controller
{
    /**
     * Generates random slug.
     *
     * @param Request $request
     * @return JsonResponse string of a randomly generated slug
     */
    public function generateSlug(Request $request) : JsonResponse
    {
        return response()->json(ShortLink::generateRandomSlug());
    }

    /**
     * Get an paginated index of short links.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        $shortLinks = ShortLink::simplePaginate(25);
        return response()->json($shortLinks);
    }

    /**
     * Get an instance of a short link.
     *
     * @param Request $request
     * @param String $slug
     * @return JsonResponse
     */
    public function find(Request $request, String $slug) : JsonResponse
    {
        $shortLink = ShortLink::where('slug', $slug)->first();
        return response()->json($shortLink);
    }

    /**
     * Create an instance of a short link.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse
    {
        // Only Retrieve desired fields to create
        $createRequest = $request->only('slug', 'destination');
        // Validate for correct inputs and make sure slug is unique.
        $validator = $this->validate($request, [
            // allow max of 20 characters for custom short links
            'slug' => 'nullable|alpha_num|unique:shortlinks,slug|max:20',
            'destination' => 'required|url|max:2048',
        ], [
            'destination.url' => 'The :attribute format is invalid. Format must include http:// or https://'
        ]);
        // If there is no slug in the request, then generate one.
        if (empty($createRequest['slug'])) {
            $createRequest['slug'] = ShortLink::generateRandomSlug();
        }
        // There is a small race condition if two exact same slugs try to get created at the same time,
        // there will be a database error of the slug not being unique.
        try {
            $shortLink = ShortLink::create($createRequest);
        } catch (\Exception $e) {
            response()->json('Link was not created. Please try a different slug.', 500);
        }
        return response()->json($shortLink);
    }

    /**
     * Update an instance of a short link.
     *
     * @param Request $request
     * @param String $slug
     * @return JsonResponse
     */
    public function update(Request $request, String $slug)
    {
        // Just throw a 501 because the resource is not implemented
        response('Not Implemented', 501);
    }

    /**
     * Delete an instance of a short link.
     *
     * @param Request $request
     * @param String $slug
     * @return JsonResponse Will only have a boolean for if it was deleted or not.
     */
    public function delete(Request $request, String $slug) : JsonResponse
    {
        return response()->json(ShortLink::where('slug', $slug)->delete());
    }
}
