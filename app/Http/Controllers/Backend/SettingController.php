<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first(); // Fetch first record 
        return view('backend.settings.company', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            // 'favicon_icon' => 'nullable|image|mimes:ico,png,jpeg,jpg',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        // echo "<pre>";
        // print_r($request->all());
        // die;

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        } 
 
        // Handle Logo Upload to `public/uploads/`  
        if ($request->hasFile('logo')) {
            // Generate a new file name: logo_YYYYMMDD.ext
            $fileName = 'logo_' . date('Ymd') . '.' . $request->file('logo')->getClientOriginalExtension();
            $logoPath = public_path('uploads/' . $fileName);

            // Delete the old logo if it exists
            if ($setting->logo && File::exists(public_path('uploads/' . $setting->logo))) {
                File::delete(public_path('uploads/' . $setting->logo));
            }

            // Move file to public/uploads/
            $request->file('logo')->move(public_path('uploads/'), $fileName);
            $setting->logo = $fileName;
        }

        // Handle Favicon Upload to `public/uploads/`
        if ($request->hasFile('favicon_icon')) {
            // Generate a new file name: favicon_YYYYMMDD.ext
            $faviconFileName = 'favicon_' . date('Ymd') . '.' . $request->file('favicon_icon')->getClientOriginalExtension();
            $faviconPath = public_path('uploads/' . $faviconFileName);

            // Delete the old favicon if it exists
            if ($setting->favicon_icon && File::exists(public_path('uploads/' . $setting->favicon_icon))) {
                File::delete(public_path('uploads/' . $setting->favicon_icon));
            }

            // Move file to public/uploads/
            $request->file('favicon_icon')->move(public_path('uploads/'), $faviconFileName);
            $setting->favicon_icon = $faviconFileName;
        }

        $setting->fill($request->except(['logo', 'favicon_icon']));
        $setting->save();

        return redirect()->route('dashboard.settings.index')->with('success', 'Settings updated successfully!');
    }
}
