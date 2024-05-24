<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    ///////////////////////////////////////////////////////////////////////////
    /////////////////                 Image                   /////////////////
    ///////////////////////////////////////////////////////////////////////////

    //INFO: Get all images with the laravel paginate method
    public function getImagesPaginate(Request $request)
    {
        $paginatelimit = intval($request->query('limit')) ?: 10;
        return ImageResource::collection(Image::orderBy('id', 'DESC')->paginate($paginatelimit));
    }

    //INFO: Get all images
    public function getImages()
    {
        return ImageResource::collection(Image::orderBy('id', 'DESC')->get());
    }

    //INFO: Add image
    public function addImage(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'image' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        if ($validators->passes()) {
            if ($request->file()) {
                $fileName = Str::random(20) . '.' . $request->file('image')->getClientOriginalName();
                $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); // save uploaded file in '/storage/uploads'
                Image::create([
                    'name' => $fileName,
                    'path' => $filePath
                ]);
            }
            return Response::json(['state' => 'success', 'success' => 'Image created successfully']);
        }

        return Response::json(['state' => 'error', 'error' => $validators->getMessageBag()->toArray()]);
    }

    //INFO: Delete a existing image
    public function deleteImage(string $id)
    {
        $image = Image::where('id', $id)->first();
        if ($image) {
            $image->delete();
            Storage::disk('public')->delete($image->path);
            return Response::json(['state' => 'success', 'success' => 'Image deleted successfully']);
        }
        return Response::json(['state' => 'error', 'error' => 'Image not found!']);
    }
}
