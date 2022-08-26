@extends('layouts.app_light')
@section('title','Đọc truyện online, truyện hay, BĐS mới đăng bán')
@section('content')
<div id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-8 offset-lg-3 offset-sm-2 my-md-5 mt-4 mb-3">
                @include('layouts.box-search')
            </div>
        </div>
        <section class="box-1">
            <div class="row">
                <div class="col-lg-8">
                    <ul class="nav nav-tabs tab-novel">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#good-novel">BĐS nổi bật</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#reading-novel">Đang đọc</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-novel-content mt-4 ">
                        <div class="tab-pane active" id="good-novel" style="height:356px">
                            <div class="owl-carousel owl-theme owl-loaded slide-good-novel" >
                                <div class="owl-stage-outer" >
                                    <div class="owl-stage pb-2" >
                                        @foreach($data_hots as $data)
                                        <div class="owl-item item" height="356">
                                            <a href="/chi-tiet/{{$data->slug}}" title="{{$data->name}}" >
                                                <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" height="220" class="w-100 thum">
                                                <div class="content py-sm-3 py-2 px-2">
                                                    <h5 class="name mt-2 mb-3 mb-sm-4 text-2-line">
                                                        {{$data->name}}
                                                    </h5>
                                                    <div class="author align-items-center d-flex">
                                                        <img src="/images/light/ic_author_gray.svg" width="18" height="18" alt="Tác giả" class="mr-1">
                                                        <span class="text-000-4 text-1-line">{{$data->author->name}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab-content tab-novel-content" id="reading-novel" style="height:356px">
                            <!-- <div class="btn-next-read">
                            </div>
                            <div class="btn-prev-read">
                            </div> -->
                            <div class="owl-carousel owl-theme owl-loaded slide-read-novel" >
                                <div class="owl-stage-outer" >
                                    <div class="owl-stage pb-2" >
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="new-release">
                        <div class="title text-center mt-4 mt-lg-0">
                            Mới ra mắt
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme owl-loaded slide-new-novel" style="height:367px">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach($data_news as $data)
                                <a class="new-release owl-item item" href="/chi-tiet/{{$data->slug}}" >
                                    <div class="content px-3 px-md-4 mt-sm-4 mt-4 ">
                                        <div class="top d-flex">
                                            <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="thum br-6">
                                            <div class="content-top pl-3 mt-3 ">
                                                <h5 class="name text-2-line">
                                                    {{$data->name}}
                                                </h5>
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_white.svg" width="18" height="18" alt="Tác giả" class="mr-1 mt-2px author-img">
                                                    <span class="text-2-line">{{$data->author->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bottom mt-4">
                                            <div class="des text-left">
                                                {!!$data->content!!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="py-4">
            @include('layouts.ads.banner_1')
        </div>
        @include('layouts.listNew', ['data_updates' => $data_updates])
    </div>
</div>
@include('layouts.listFull')
<div class="container pb-4">
    @include('layouts.ads.banner_1')
</div>

<script>
    $('.slide-good-novel').owlCarousel({
        loop:true,
        margin:24,
        pagination: false,
        autoplay:true,
        autoplayTimeout:3000,
        dots: true,
        nav: false,
        responsiveClass:true,
        autoplayHoverPause:true,
        // navText: [$('.btn-prev-good'),$('.btn-next-good')],
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:3,
            },
            1200:{
                items:4,
            }
        }
    })

    $('.slide-new-novel').owlCarousel({
        loop:true,
        margin:0,
        pagination: false,
        dots: true,
        nav:false,
        autoplay:true,
        autoplayTimeout:3000,
        responsiveClass:true,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1,
            },
            700:{
                items:2,
                margin:20,
                dots:false,
            },
            992: {
                items:1,
            }
        }
    })

    $( document ).ready(function() {
        var list_history = [];
        if(JSON.parse(localStorage.getItem("History"))==null) {
            var html = '<p class="noti-null h5 text-warning text-center">'+'Bạn chưa xem BĐS nào'+'</p>'
            $('#reading-novel').html(html)
        }else {
            list_history = JSON.parse(localStorage.getItem("History"))
            list_history = list_history.reverse()
            $.each( list_history, function( key, value ) {
                if(key<12){
                    let html='';
                    html += '<div class="owl-item item" height="356">'
                    html += '<div>'
                    html += '<a href="/chi-tiet/'+ value.url_story +'">'
                    html += '<img src="/image-avatars/'+value.image+'" alt="" height="220" class="w-100 thum br-6">'
                    html += '</a>'
                    html += '<div class="content py-2 py-sm-3 px-2 br-6">'
                    html += '<a class="name mt-2 mb-sm-4 h5 mb-3 text-2-line" href="/chi-tiet/'+ value.url_story +'">'+ value.name+'</a>'
                    html += '<a  class="d-flex text-000-4 align-items-center" href="'+value.url+'">'
                    html += '<img src="/images/light/ic_chapter_gray.svg" width="16" height="16" alt="Chương" class="mr-1 thum-read">'
                    html += '<span class="text-1-line">'+value.chap+'</span>'
                    html += '</a>'
                    html += '</div>'
                    html += '</div>'
                    html += '</div>'
                    $('.slide-read-novel .owl-stage').append(html)
                }
            })
        }

        var owlRead = $('.slide-read-novel')

        bsContainerWidth = $("body").find('.container').width()
        if (bsContainerWidth <= 600) {
            if(list_history.length >=2) {
                owlRead.owlCarousel({
                    loop:true,
                    margin:24,
                    pagination: false,
                    autoplay:true,
                    ltr: true,
                    autoplayTimeout:3000,
                    dots: true,
                    nav: false,
                    autoplayHoverPause:true,
                    items:2,
                })
            }else {
                owlRead.owlCarousel({
                    loop:false,
                    margin:24,
                    pagination: false,
                    autoplay:true,
                    ltr: true,
                    autoplayTimeout:3000,
                    dots: true,
                    nav: false,
                    autoplayHoverPause:true,
                    items:2,
                })
            }
        }
        else {
            if(list_history.length >=4) {
                owlRead.owlCarousel({
                    loop:true,
                    margin:24,
                    pagination: false,
                    autoplay:true,
                    autoplayTimeout:3000,
                    dots: true,
                    nav: false,
                    responsiveClass:true,
                    autoplayHoverPause:true,
                    // navText: [$('.btn-prev-good'),$('.btn-next-good')],
                    responsive:{
                        0:{
                            items:2,
                        },
                        600:{
                            items:3,
                        },
                        1200:{
                            items:4,
                        }
                    },
                })

            }else {
                owlRead.owlCarousel({
                    loop:false,
                    margin:24,
                    pagination: false,
                    autoplay:true,
                    autoplayTimeout:3000,
                    dots: true,
                    nav: false,
                    responsiveClass:true,
                    autoplayHoverPause:true,
                    // navText: [$('.btn-prev-good'),$('.btn-next-good')],
                    responsive:{
                        0:{
                            items:2,
                        },
                        600:{
                            items:3,
                        },
                        1200:{
                            items:4,
                        }
                    },
                })
            }
        }






        $("#pac-input").keyup(function(e){
            var code = e.key;
            if(code==="Enter") e.preventDefault();
            let search_input = $('#pac-input').val()
            search_input = search_input.trim();
            if(search_input.length >= 1) {
                if(code==="Enter"){
                    window.location.href = "/ket-qua?" + "tukhoa=" + search_input;
                }
            }
        });

        $('.icon-search').click(function() {
            let search_input = $('#pac-input').val()
            search_input = search_input.trim();
            if(search_input.length >= 1 ) {
                window.location.href = "/ket-qua?" + "tukhoa=" + search_input;
            }
        })
    });
</script>
@endsection
