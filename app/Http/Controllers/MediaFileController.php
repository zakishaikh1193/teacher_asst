<?php

namespace App\Http\Controllers;

use App\Models\MediaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaFileController extends Controller
{
    public function index()
    {
        return view('backend.media.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,webp,gif,mp4,mov,avi,mkv|max:102400',
        ]);

        $file = $request->file('file');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $cleanName = Str::slug($originalName); // remove spaces, special chars
        $timestamp = now()->format('YmdHis');
        $filename = "{$cleanName}_{$timestamp}.{$extension}";

        $type = Str::startsWith($file->getMimeType(), 'video') ? 'video' : 'image';

        $file->move(public_path('uploads/media'), $filename);

        $media = MediaFile::create([
            'file_name' => $filename, // only name stored
            'slug' => $cleanName . '-' . uniqid(),
            'file_type' => $type,
            'file_path' => 'uploads/media' // no longer needed (optional: remove column)
        ]);

        return response()->json(['success' => true, 'media' => $media]);
    }

    public function list(Request $request)
    {
        $media = MediaFile::latest()->paginate(12);
        return response()->json($media);
    }

    public function delete($id)
    {
        $media = MediaFile::findOrFail($id);

        $fullPath = public_path('uploads/media/' . $media->file_name);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }

        $media->delete();

        return response()->json(['success' => true]);
    }
}
