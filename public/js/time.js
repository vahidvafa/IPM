var totaltime = 10;
function update(percent){
    var deg;
    if(percent<(totaltime/2)){
        deg = 90 + (360*percent/totaltime);
        $('.pie,.pie2').css('background-image',
            'linear-gradient('+deg+'deg, transparent 50%, white 50%),linear-gradient(90deg, white 50%, transparent 50%)'
        );
    } else if(percent>=(totaltime/2)){
        deg = -90 + (360*percent/totaltime);
        $('.pie,.pie2').css('background-image',
            'linear-gradient('+deg+'deg, transparent 50%, #1fbba6 50%),linear-gradient(90deg, white 50%, transparent 50%)'
        );
    }
}
var count = parseInt($('#time,#time2').text());
myCounter = setInterval(function () {

    count+=1;
    $('#time,#time2').html(count);
    update(count);

    if(count==totaltime) {
        clearInterval(myCounter);
        update(percent)
    }
}, 1000);/**
 * Created by zb_b89 on 10/4/2019.
 */
