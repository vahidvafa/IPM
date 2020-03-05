<?php

namespace App\Http\Controllers;

use App\News;
use App\Picture;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCms()
    {
        $news = News::latest()->paginate(10);
        return view('cms.news.index', compact('news'));
    }

    public function index()
    {
        $titleHeader = "تمام اخبار";
        $breadcrumb = "اخبار";
        $news = News::whereState(1)->latest()->paginate(15);
        return view('news', compact('news', 'titleHeader', "breadcrumb"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "detail" => "required",
            "image" => "required|image",
        ], ['*.required' => 'وارد کردن این فیلد الزامی است']);
//        try {
        $news = new News($request->all());
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('/img/news/'), $imageName);
        $news->photo = $imageName;
        $news->save();
        for ($i = 0; $i < count($request->file('pictures')); $i++) {
            $imageName = time() . $i . '.' . $request->file('pictures')[$i]->getClientOriginalExtension();
            $request->file('pictures')[$i]->move(public_path('/img/news/'), $imageName);
            $photo = new Picture(['url' => $imageName]);
            $news->pictures()->save($photo);
        }
        flash_message('success', __('string.successful'));
        return redirect()->route('news.index');
//        } catch (\Exception $exception) {
        flash_message('error', __('string.unsuccessful'));
        return back()->withInput($request->all());
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $titleHeader = $news->title;
        $breadcrumb = "اخبار";
        return view('news_detail', compact('news', 'titleHeader', 'breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('cms.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "detail" => "required",
            "image" => "image"
        ], ['*.required' => 'وارد کردن این فیلد الزامی است']);
        try {
            $news->update($request->all());
            if ($request->has('image')) {
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('/img/news/'), $imageName);
                $news->photo = $imageName;
                $news->save();
            }
            if ($request->hasFile('pictures')) {
                for ($i = 0; $i < count($request->file('pictures')); $i++) {
                    $imageName = time() . $i . '.' . $request->file('pictures')[$i]->getClientOriginalExtension();
                    $request->file('pictures')[$i]->move(public_path('/img/news/'), $imageName);
                    $photo = new Picture(['url' => $imageName]);
                    $news->pictures()->save($photo);
                }
            }
            flash_message('success', __('string.successful.edit'));
            return redirect()->route('news.index');
        } catch (\Exception $exception) {
            flash_message('error', __('string.unsuccessful'));
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            flash_message('success', __('string.successful.delete'));
        } catch (\Exception $exception) {
            flash_message('error', __('string.unsuccessful'));
        }
        return back();
    }
}
