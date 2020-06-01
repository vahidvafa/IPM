<?php

namespace App\Http\Controllers;

use App\ImageGallery;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = ImageGallery::latest()->paginate(10);
        return view('cms.archive.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.archive.image.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = new ImageGallery($request->all());

        $imageName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move(public_path('/img/image_archive/'), $imageName);
        $img->photo = $imageName;

        $b = $img->save();

        if ($b)
            flash_message('success', __('string.successful'));
        else
            flash_message('error', __('string.unsuccessful'));

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImageGallery $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ImageGallery $imageGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageGallery $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageGallery $imageGallery)
    {

        return view('cms.archive.image.edit', ['img' => $imageGallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ImageGallery $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageGallery $imageGallery)
    {

        if ($request->has('photo'))
        $request->file('photo')->move(public_path("/img/image_archive/"), $imageGallery->photo);

        $imageGallery->url = $request->get('url');



        $b = $imageGallery->save();

        if ($b)
            flash_message('success', __('string.successful.edit'));
        else
            flash_message('error', __('string.unsuccessful.edit'));

        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageGallery $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageGallery $imageGallery)
    {
        $b = $imageGallery->delete();

        if ($b)
            flash_message('success', __('string.successful.delete'));
        else
            flash_message('error', __('string.unsuccessful.delete'));


        return back();
    }
}
