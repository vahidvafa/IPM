<?php

namespace App\Http\Controllers;

use App\Job;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(15);
        return response()->json($jobs);
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
        $this->validate($request, [
            'content' => 'bail |required',
            'min_salary' => 'bail |required|required_with:max_salary|integer',
            'max_salary' => 'bail |required|required_with:min_salary|integer|greater_than_field:min_salary',
            'province_id' => 'bail |required|integer',
            'category_id' => 'bail |required|integer',
        ]);
        $job = new Job($request->all());
        $user = \App\User::find(auth()->id());
        $user->jobs()->save($job);
        return response()->json(makeMsgCode(true, 'success', '00'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return response()->json($job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $this->validate($request, [
            'content' => 'bail |required',
            'min_salary' => 'bail |required|required_with:max_salary|integer',
            'max_salary' => 'bail |required|required_with:min_salary|integer|greater_than_field:min_salary',
            'province_id' => 'bail |required|integer',
            'category_id' => 'bail |required|integer',
        ]);
//        $request->request->add(['state' => 0]);
        $job->update($request->all());
        $job->state = 0;
        $job->save();
        return response()->json(makeMsgCode(true, 'success', '00'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(makeMsgCode(true, 'success', '00'));
    }
}
