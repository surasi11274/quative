
var current_fs, next_fs, previous_fs ; //fieldsets ตัวฟิลฟอร์มที่จะใส่
var left, opacity, scale; //fieldset properties which we will animate ตัวตั้งการเคลื่อรไหว
var animating; //flag to prevent quick multi-click glitches คลิกเพื่ออนิเมท

$(".next").click(function(){
    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("_active_pro");

    //show the next fieldset แสดงฟอร์มถัดไปขึ้นมา
    next_fs.show();
    //hide the current fieldset with style ซ่อน ฟิลตัวเดิม ให้ จางไป
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0; //0.2 old value
            //2. bring next_fs from the right(50%)
            left = (now * 0)+"%"; //50 old value
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale('+scale+')',
                'position': 'relative' //absolute
            });
            // next_fs.css({'left': left, 'opacity': opacity});
            next_fs.css({'opacity': opacity});

        },
        duration: 200,
        complete: function(){
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function(){
    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("_active_pro");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 1}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 1 + (1 - now) * 0; // 0.8 scale and 0.2  minus old value 
            //2. take current_fs to the right(50%) - from 0%
            left = ((1-now) * 0)+"%"; //50 old value
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            // previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
            previous_fs.css({'opacity': opacity});

           
        },
        duration: 200,
        complete: function(){
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});


