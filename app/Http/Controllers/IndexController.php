<?php

namespace App\Http\Controllers;

use App\Event;
use App\IPMA;
use App\MembershipType;
use App\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->limit(4)->get(['id', 'photo', 'title', 'description', 'from_date']);
        $news = News::latest()->limit(3)->get(['id', 'photo', 'title', 'created_at']);
        $ipma = IPMA::latest()->first();
        return view('index', compact('events', 'news', 'ipma'));
    }

    public function search()
    {
        $titleHeader = $breadcrumb = "جستجو";
        if (\request()->has('search')) {
            $searchString = \request()->get('search');
            $news = News::where("title", "LIKE", "%$searchString%")->get(['id', 'title', 'photo']);
            $events = Event::where("title", "LIKE", "%$searchString%")
                ->orWhere("address", "LIKE", "%$searchString%")
                ->orWhere("tel", "LIKE", "%$searchString%")
                ->orWhere("course_headings", "LIKE", "%$searchString%")
                ->get(['id', 'title', 'photo']);
        } else {
            $news = News::latest()->limit(10)->get(['id', 'title', 'photo']);
            $events = Event::latest()->limit(10)->get(['id', 'title', 'photo']);
        }
        return view('search', compact('titleHeader', 'breadcrumb', 'news', 'events'));
    }

    public function cms()
    {
        return view('cms.panel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function about_us()
    {
        $titleHeader = "درباره انجمن";
        $breadcrumb = "درباره ما";
        return view('about_us', compact('titleHeader', 'breadcrumb'));
    }
}
