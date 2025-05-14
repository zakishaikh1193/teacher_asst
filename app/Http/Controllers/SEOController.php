<?php

namespace App\Http\Controllers;

use App\Models\SEO;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    /**
     * Get SEO details for a specific page.
     */
    public function getSEO($page_name)
    {
        $seo = SEO::where('page_name', $page_name)->first();

        if (!$seo) {
            return response()->json(['message' => 'SEO data not found'], 404);
        }

        return response()->json($seo);
    }

    /**
     * Set or update SEO details for a page.
     */
    public function setSEO(Request $request)
    {
        $request->validate([
            'page_name' => 'required_without:id|string|unique:seo,page_name,' . $request->id, // Ignore current ID 
            'title' => 'required|string|max:255',
            'meta_description' => 'required|string', 
            'keywords' => 'required|string',
            'id' => 'nullable|exists:seo,id'
        ]);

        // return response()->json(['message' => 'SEO data updated successfully', 'seo' => $seo]);

        // try {
        //     SEO::updateOrCreate(
        //         ['page_name' => $request->page_name],
        //         [
        //             'title' => $request->title,
        //             'meta_description' => $request->meta_description,
        //             'keywords' => $request->keywords
        //         ]
        //     );

        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'SEO data updated successfully!'
        //     ]);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'An error occurred while updating SEO data.'
        //     ], 500);
        // }

        try {
            if (isset($request->id) && !empty($request->id)) {
                // Update existing record by ID
                $seo = SEO::findOrFail($request->id);
                $seo->update([
                    'title' => $request->title,
                    'meta_description' => $request->meta_description,
                    'keywords' => $request->keywords
                ]);
            } else {
                // Create a new SEO entry
                $seo = SEO::create([
                    'page_name' => $request->page_name,
                    'title' => $request->title,
                    'meta_description' => $request->meta_description,
                    'keywords' => $request->keywords
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'SEO data saved successfully!',
                'seo' => $seo
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving SEO data.'
            ], 500);
        }
    }
}
