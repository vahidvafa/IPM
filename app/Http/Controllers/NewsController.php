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
        $news = News::latest()->where('lang_id',1)->paginate(10);
        $lang_id = 1;
        return view('cms.news.index', compact('news','lang_id'));
    }


    public function indexCmsEn()
    {
        $news = News::latest()->where('lang_id',2)->paginate(10);
        $lang_id = 2;
        return view('cms.news.index', compact('news','lang_id'));
    }

    public function index()
    {
        $titleHeader = "تمام اخبار";
        $breadcrumb = "اخبار";
        $news = News::whereState(1)->latest()->paginate(15);
        return view('news', compact('news', 'titleHeader', "breadcrumb"));
    }

    public function indexEn()
    {
        $titleHeader = "News Archive";
        $breadcrumb = "News";
        $news = News::whereState(1)->latest()->paginate(15);
        return view('en.news', compact('news', 'titleHeader', "breadcrumb"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang_id = 1;
        return view('cms.news.create',compact('lang_id'));
    }

    public function createEn()
    {
        $lang_id = 2;
        return view('cms.news.create',compact('lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return response()->json($request->all());
        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "detail" => "required",
            "image" => "required|image",
        ], ['*.required' => 'وارد کردن این فیلد الزامی است']);
        try {
            $requestt = $request->all();
            $requestt['state'] = (int) $request->has('state');

            $news = new News($requestt);
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/img/posts/'), $imageName);
            $news->photo = $imageName;
            $news->save();
            if ($request->has('pictures')) {
                for ($i = 0; $i < count($request->file('pictures')); $i++) {
                    $imageName = time() . $i . '.' . $request->file('pictures')[$i]->getClientOriginalExtension();
                    $request->file('pictures')[$i]->move(public_path('/img/posts/'), $imageName);
                    $photo = new Picture(['url' => $imageName]);
                    $news->pictures()->save($photo);
                }
            }
            flash_message('success', __('string.successful'));
            if ($request->get('lang_id') == 1)
                return redirect()->route('news.index');
            else
                return redirect()->route('news.en.index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
            flash_message('error', __('string.unsuccessful'));
            return back()->withInput($request->all());
        }
    }

//    public function storeEn(Request $request)
//    {
//        $this->validate($request, [
//            "title" => "required",
//            "description" => "required",
//            "detail" => "required",
//            "image" => "required|image",
//        ], ['*.required' => 'وارد کردن این فیلد الزامی است']);
//        try {
//            $requestt = $request->all();
//            $requestt['state'] = (int) (int) $request->has('state');
//
//            $news = new News($requestt);
//            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
//            $request->file('image')->move(public_path('/img/posts/'), $imageName);
//            $news->photo = $imageName;
//            $news->save();
//            for ($i = 0; $i < count($request->file('pictures')); $i++) {
//                $imageName = time() . $i . '.' . $request->file('pictures')[$i]->getClientOriginalExtension();
//                $request->file('pictures')[$i]->move(public_path('/img/posts/'), $imageName);
//                $photo = new Picture(['url' => $imageName]);
//                $news->pictures()->save($photo);
//            }
//            flash_message('success', __('string.successful'));
//            return redirect()->route('news.index');
//        } catch (\Exception $exception) {
//            flash_message('error', __('string.unsuccessful'));
//            return back()->withInput($request->all());
//        }
//    }

    /**
     * Display the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        if ($news->state != 1)
            abort(404);

        if ($news->lang_id != 1)
            abort(404);

        $titleHeader = $news->title;
        $breadcrumb = "اخبار";
        return view('news_detail', compact('news', 'titleHeader', 'breadcrumb'));
    }

    public function showEn(News $news)
    {
        if ($news->state != 1)
            abort(404);

        if ($news->lang_id != 2)
            abort(404);

        $titleHeader = $news->title;
        $breadcrumb = "News";
        return view('en.newsDetailEn', compact('news', 'titleHeader', 'breadcrumb'));
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

//    public function editEn(News $news)
//    {
//        return view('cms.news.en.edit', compact('news'));
//    }

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
            $requestt = $request->all();
            $requestt['state'] = (int) $request->has('state');

            $news->update($requestt);

            if ($request->has('image')) {
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('/img/posts/'), $imageName);
                $news->photo = $imageName;
                $news->save();
            }
            if ($request->hasFile('pictures')) {
                for ($i = 0; $i < count($request->file('pictures')); $i++) {
                    $imageName = time() . $i . '.' . $request->file('pictures')[$i]->getClientOriginalExtension();
                    $request->file('pictures')[$i]->move(public_path('/img/posts/'), $imageName);
                    $photo = new Picture(['url' => $imageName]);
                    $news->pictures()->save($photo);
                }
            }
            flash_message('success', __('string.successful.edit'));
            if ($request->get('lang_id') == 1)
                return redirect()->route('news.index');
            else
                return redirect()->route('news.en.index');
        } catch (\Exception $exception) {
            flash_message('error', __('string.unsuccessful'));
            return back();
        }
    }

//    public function updateEn(Request $request, News $news)
//    {
//        $this->validate($request, [
//            "title" => "required",
//            "description" => "required",
//            "detail" => "required",
//            "image" => "image"
//        ], ['*.required' => 'وارد کردن این فیلد الزامی است']);
//        try {
//            $requestt = $request->all();
//            $requestt['state'] =(int) $request->has('state');
//
//            $news->update($requestt);
//            if ($request->has('image')) {
//                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
//                $request->file('image')->move(public_path('/img/posts/'), $imageName);
//                $news->photo = $imageName;
//                $news->save();
//            }
//            if ($request->hasFile('pictures')) {
//                for ($i = 0; $i < count($request->file('pictures')); $i++) {
//                    $imageName = time() . $i . '.' . $request->file('pictures')[$i]->getClientOriginalExtension();
//                    $request->file('pictures')[$i]->move(public_path('/img/posts/'), $imageName);
//                    $photo = new Picture(['url' => $imageName]);
//                    $news->pictures()->save($photo);
//                }
//            }
//            flash_message('success', __('string.successful.edit'));
//            return redirect()->route('news.index');
//        } catch (\Exception $exception) {
//            flash_message('error', __('string.unsuccessful'));
//            return back();
//        }
//    }

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
