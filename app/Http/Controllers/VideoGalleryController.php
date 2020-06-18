<?php

namespace App\Http\Controllers;

use App\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = VideoGallery::latest('id')->paginate(5);
        return view('cms.archive.video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.archive.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new VideoGallery($request->all());

        $b = $video->save();

        if ($b)
            flash_message('success', __('string.successful'));
        else
            flash_message('error', __('string.unsuccessful'));

        return back()->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(VideoGallery $videoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoGallery $videoGallery)
    {
        return view('cms.archive.video.edit',['video'=>$videoGallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoGallery $videoGallery)
    {
        $b = $videoGallery->update($request->all());

        if ($b)
            flash_message('success', __('string.successful.edit'));
        else
            flash_message('error', __('string.unsuccessful.edit'));

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoGallery $videoGallery)
    {
        $b = $videoGallery->delete();

        if ($b)
            flash_message('success', __('string.successful.delete'));
        else
            flash_message('error', __('string.unsuccessful.delete'));


        return back();

    }

    public function archive()
    {
        $breadcrumb = "آرشیو ویدیو ها";
        $titleHeader = "ویدیو ها";
        $videos = VideoGallery::latest('id')->get();
//        return ($videos);
        return view('video_archive',compact('titleHeader','breadcrumb','videos'));
    }
}
