<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\Order;
use App\OrderCode;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OrderCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\OrderCode  $orderCode
     * @return \Illuminate\Http\Response
     */
    public function show(OrderCode $orderCode)
    {
        //
//        $order = Order::find($orderCode->order_id);
//        $event = Event::find($order->event_id);
//        $category = persianText($event->category()->get('name')->first()->name);
//        $date = $event->from_date;
//        $address = $event->address;
//        $latitude = $event->latitude;
//        $longitude = $event->longitude;
//        $time = jdate($date)->format('H:i'). persianText(" ساعت ");
//        switch ($event->event_category_id){
//            case 1:
//                $img = Image::make(public_path('img/BO1-red.jpg'));
//                break;
//            case 2:
//                $img = Image::make(public_path('img/BO1-ornge.jpg'));
//                break;
//            case 3:
//                $img = Image::make(public_path('img/BO1-blue.jpg'));
//                break;
//            default:
//                $img = Image::make(public_path('img/BO1-blue.jpg'));
//        }
//        $lines = explode("\n", wordwrap(" محل برگزاری : $address ", 69));
//        foreach ($lines as $index => $line){
//            if ($index == 0 ){
//                $y = 950;
//            }else{
//                $y = 950 + ($index *30);
//            }
//            $img->text(persianText($line), 650, $y, function(\Intervention\Image\Gd\Font $font) {
//                $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//                $font->size(25);
//                $font->color('#424B54');
//                $font->align('right');
//                $font->valign('center');
//                $font->angle(0);
//            });
//        }
//        $img->text(jdate($date)->format('%Y'), 190, 690, function(\Intervention\Image\Gd\Font $font) {
//            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//            $font->size(42);
//            $font->color('#424B54');
//            $font->align('right');
//            $font->valign('bottom');
//            $font->angle(0);
//        });
//        $img->text(persianText(jdate($date)->format('%d %B')), 420, 700, function(\Intervention\Image\Gd\Font $font) {
//            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//            $font->size(28);
//            $font->color('#424B54');
//            $font->align('right');
//            $font->valign('bottom');
//            $font->angle(0);
//        });
//        $img->text($time, 420, 870, function(\Intervention\Image\Gd\Font $font) {
//            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//            $font->size(28);
//            $font->color('#424B54');
//            $font->align('right');
//            $font->valign('bottom');
//            $font->angle(0);
//        });
//        $img->text($category, 500, 1200, function(\Intervention\Image\Gd\Font $font) {
//            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//            $font->size(35);
//            $font->color('#424B54');
//            $font->align('right');
//            $font->valign('bottom');
//            $font->angle(0);
//        });
//        $img->text(persianText(jdate($date)->format('%A')), 610, 700, function(\Intervention\Image\Gd\Font $font) {
//            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//            $font->size(38);
//            $font->color('#424B54');
//            $font->align('right');
//            $font->valign('bottom');
//            $font->angle(0);
//        });
//        $img->text(persianText($event->title), 340, 510, function(\Intervention\Image\Gd\Font $font) {
//            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//            $font->size(28);
//            $font->color('#424B54');
//            $font->align('center');
//            $font->valign('bottom');
//            $font->angle(0);
//        });
//        $img->text(persianText($orderCode->name), 340, 250, function(\Intervention\Image\Gd\Font $font) {
//            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//            $font->size(30);
//            $font->color('#424B54');
//            $font->align('center');
//            $font->valign('bottom');
//            $font->angle(0);
//        });
//        $img->text($orderCode->code . persianText("کد :"), 340, 350, function(\Intervention\Image\Gd\Font $font) {
//            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//            $font->size(30);
//            $font->color('#424B54');
//            $font->align('center');
//            $font->valign('bottom');
//            $font->angle(0);
//        });
//        $img->text(persianText('مجوز حضور'), 320, 100, function(\Intervention\Image\Gd\Font $font) {
//            $font->file(public_path('fonts/ttf/IRANSansWeb_Bold.ttf'));
//            $font->size(40);
//            $font->color('#ffffff');
//            $font->align('right');
//            $font->valign('bottom');
//            $font->angle(0);
//        });
//        $img->insert("https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://maps.google.com/?q=$latitude,$longitude",'bottom-left',50,175);
//        $imageName = $orderCode->id . $order->id . time();
//        $img->save(public_path("img/codes/$imageName.jpg"));
//        echo "<img src='".asset("img/codes/$imageName.jpg")."'>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderCode  $orderCode
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderCode $orderCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderCode  $orderCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderCode $orderCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderCode  $orderCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderCode $orderCode)
    {
        //
    }
}
