var min_id = 0;

$('.form-horizontal').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "/price-ajax",
        data: $('.form-horizontal').serialize(),
        success: function(res) {
            if(res.errors) {
                $('.error').html(res.errors);
            } else if(res.graph) {
                $('.view').html(res.graph);
                $('#myChart').css({'display': 'block'});
            } else if(res.table) {
                $('#myChart').css({'display': 'none'});
                $('.view').html(res.table);
            } else {
                $('.error').html("");
                $('.view').html("");
                $('#myChart').css({'display': 'none'});
            }
        },
        error: function(res) {
            alert("По выбранным критериям данных нет!");
        }
    });
});

$( document ).ready(function() {

    /*сlic calendar*/
    // $('td').click(function() {
    //     alert('test');
    // });
    /*-------------*/

    $('.east-header-hamburger').on('click',function () {

        $( '.east-menu' ).slideToggle( "slow", function() {

        });
    });



    $('.east-header-username').on('click',function () {

        $( '.east-header-personal_menu' ).slideToggle( "slow", function() {

        });
    });


    $('.search-icon-btn').click(function() {
        $('.search-input').css('display', 'block');
    });

    $('.search-exit').click(function() {
        $('.search-input').css('display', 'none');
    });

    // $(document).mouseup(function (e){ // событие клика по веб-документу
    //     var div = $("#search-bth"); // тут указываем ID элемента
    //     if (!div.is(e.target) // если клик был не по нашему блоку
    //         && div.has(e.target).length === 0) { // и не по его дочерним элементам
    //         $('.search-input').css('display', 'none');
    //     }
    // });



    $('.img-cont').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        gallery: {
            enabled: true
        },
        image: {
            verticalFit: true
        }
    });


    $('.descr-item img, .img-item img, .img img').click(function(){
        $.magnificPopup.open({
            items: {
                src: $(this).attr('src')
            },
            type: 'image',

            gallery: {
                enabled: true
            }
        });
    });



    //---------------------------------------------------------------------------------------

    /* 4. Calendar */
    

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
    //centerMode: true,
    //centerPadding: '20px',
    slidesToShow: 3,
    nfinite: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 60000,
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

	
