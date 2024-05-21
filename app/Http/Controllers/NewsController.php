<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $new = News::orderby('news_date', 'desc')->get();

        return response()->json($new);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = 'Adding success';

        $form_data = [
            'title' => $request->title,
            'link' => $request->link,
            'news_date' => $request->date,
            'meta_tags' => $request->meta_tags,
            'description' => $request->description,
            'image' => $request->image_name,
        ];

        News::create($form_data);

        return response()->json($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $search)
    {
        $news = News::where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('news_date', 'LIKE', '%'.$search.'%')
            ->orWhere('meta_tags', 'LIKE', '%'.$search.'%')
            ->get();

        return response()->json($news);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $news =  News::where('id', '=', $request->id)->first();

        return response()->json($news);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $message = 'Update success';

        $form_data = [
            'title' => $request->title,
            'link' => $request->link,
            'news_date' => $request->date,
            'meta_tags' => $request->meta_tags,
            'description' => $request->description,
            'image' => $request->image_name,
        ];

        News::where('id', $request->id)->update($form_data);

        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $message = 'Deleting success';

        News::where('id', '=', $request->id)->delete();

        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function upload(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage'), $imageName);

        return response()->json($imageName);
    }
}
