jQuery(document).ready(function () {
    $(".shoMoreBtn").click(function () {
        $thisPage=$(this).attr('data-page');
        $next=parseInt($thisPage)+1;
        $(".btx-page-load").css({
            "visibility":"visible",
            "opacity": 1,
        })
        $.ajax({
            type : 'GET',
            url : '/portfolio/loadmore?page='+$next,
            success : function ($data) {
                $(".shoMoreBtn").attr('data-page',$next);
                $height=$(".btx-row.btx-row--main.btx-row--no-spacing:first-child").height();
                $(".justaPackage").append($data)
                $(".btx-box-inner").css({"height":$height,})
                $(".btx-page-load").css({"visibility":"hidden", "opacity": 0})
                $("html , body").animate({scrollTop:$(".portfolioRow:last-child").offset().top},1000)
            }
        });
    })
})