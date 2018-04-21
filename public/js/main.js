var min_id = 0;

$( document ).ready(function() {

    $('.east-header-hamburger').on('click',function () {

        $( '.east-menu' ).slideToggle( "slow", function() {

        });
    });



    $('.east-header-username').on('click',function () {

        $( '.east-header-personal_menu' ).slideToggle( "slow", function() {

        });
    });



    //---------------------------------------------------------------------------------------

    /* 4. Calendar */
    $('#calendar').datepicker({
        dateFormat : "yy-mm-dd",
        minDate: new Date($('#hiddendelivdate').val()),
        monthNames : ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        dayNamesMin : ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
    });

    $('.p20-item').find('input[type=checkbox]').on('click',function(){
        if($(this).is(':checked')){
            $('.p20-item').find('button[type=submit]').removeAttr('disabled');
        }else{
            $('.p20-item').find('button[type=submit]').attr('disabled','disabled');
        }
    });
});
$('.news-comments-slick_slider-slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    adaptiveHeight: true,
    responsive: [
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        }]
});

$('.news-stroke').slick({
    centerMode: true,
    centerPadding: '20px',
    slidesToShow: 3,
    nfinite: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 1190,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
            }
        }
    ]
});
//---------------------------------------------------------------

	
