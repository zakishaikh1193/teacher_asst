<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index()
    {
        $seo = SEO::where('page_name', 'team')->first();
        $teams = DB::table('team')->get()->toArray();
        $section3 = DB::table('faq')->where('section', 'section-2-team')->get()->first();

        $data = [
            'seo' => $seo,
            'teams' => $teams,
            'section3' => $section3,
        ];
        // echo "<pre>"; 
        // print_r($data);  
        // die;  

        return view('backend.team.team')->with($data);
    }

    public function handleSection(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == "add") {
                return $this->store($request);
            } elseif ($request->action == "edit") {
                return $this->update($request);
            } elseif ($request->action == "delete") {
                return $this->destroy($request);
            }
        }
    }

    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die; 

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'button_name' => 'nullable|string|max:255',
            'url' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/team/' . $imageName;
            $image->move(public_path('uploads/team'), $imageName);
        }

        $teamId = DB::table('team')->insertGetId([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imageName,
            'button_name' => $request->button_name,
            'button_url' => $request->url,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['success' => 'Team member added successfully!', 'team_id' => $teamId]);
    }

    public function update(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:team,id',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'button_name' => 'nullable|string|max:255',
            'url' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $team = DB::table('team')->where('id', $request->id)->first();
        if (!$team) {
            return response()->json(['error' => 'Team member not found!'], 404);
        }

        $imagePath = $team->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/team/' . $imageName;
            $image->move(public_path('uploads/team'), $imageName);
        }

        DB::table('team')->where('id', $request->id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'button_name' => $request->button_name,
            'button_url' => $request->url,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'image' => isset($imageName) && !empty($imageName) ? $imageName : $team->image,
            'updated_at' => now()
        ]);

        return response()->json(['success' => 'Team member updated successfully!']);
    }

    public function destroy(Request $request)
    {
        $deleted = DB::table('team')->where('id', $request->id)->delete();
        if ($deleted) {
            return response()->json(['success' => 'Team member deleted successfully!']);
        }
        return response()->json(['error' => 'Team member not found!'], 404);
    }
}
