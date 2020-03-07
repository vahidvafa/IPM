<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $orders = Order::query();

        if ($request->has('payState')){

            $user = $request->get('user');
            $orders->orWhereHas("user",function ($query)use($user){

                $query->where('first_name','like',"%".$user."%")
                      ->orWhere('last_name','like',"%".$user."%")
                      ->orWhere('email','like',"%".$user."%")
                      ->orWhere('mobile','like',"%".$user."%")
                      ->orWhere('user_code','like',"%".$user."%");

            });

            if ($request->get('payState') != -100 )
            $orders->where('state_id','=',"".$request->get('payState')."");

            if (!empty($request->get('ref_id')))
            $orders->where('reference_id','=',"".$request->get('ref_id')."");



        }

            

        $orders = $orders->with(['orderCodes','user'=>function($query){
            $query->get(['id','first_name','last_name']);
        }])->latest()->paginate(20)->appends($request->all());


        return view('cms.buy_report',compact('orders'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
