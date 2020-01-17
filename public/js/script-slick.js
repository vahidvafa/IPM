$(document).ready(function() {


    var time = 10;
    var count =0;
    var $bar,
        $slick,
        isPause,
        tick,
        percentTime;

    $slick = $('.slider');
    $slick.slick({
        arrows: false,
        speed: 1000,
        adaptiveHeight: false,
        draggable:false,
        mobileFirst:true,
        touchMove:false

    });

    $bar = $('.slider-progress .progress');




    $(".play-circle").click(function(){


            var audioElem2 = document.getElementById('audio');
            if (audioElem2.paused){
                audioElem2.play();

            }




        function startProgressbar() {
            resettime();
            resetProgressbar();
            percentTime = 0;
            isPause = false;
            tick = setInterval(interval, 30);

        }

        myCounter = setInterval(function () {

            count+=1;
            $('#time').html(count);
            update(count);


        }, 1000);/**
         * Created by zb_b89 on 10/4/2019.
         */



        function interval() {
            if (isPause === false) {
                percentTime += 1 / (time + 0.1);
                $bar.css({
                    width: percentTime + "%"
                });
                if (percentTime >= 100) {
                    $slick.slick('slickNext');
                    startProgressbar();
                }
            }


        }
        function resettime(){
            count = 0
        }
        function resetProgressbar() {
            $bar.css({
                width: 0 + '%'
            });
            clearTimeout(tick);


        }

        startProgressbar();



    });





});