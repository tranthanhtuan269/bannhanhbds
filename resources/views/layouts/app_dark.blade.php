<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="noindex">
    <title>@yield('title', 'eNovels')</title>
    <link rel="shortcut icon" href="/images/light/fav_novel_blue.png" />
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.default.css">
    <script src="/js/owl.carousel.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    @include('layouts/css')
    @include('layouts/css_dark')
    @include('layouts/reponsive')
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
</head>
<body class="dark">
    <header class="header">
        <div class="container">
            <div class="header-content ">
                <nav class="navbar px-0  py-2 navbar-expand-lg ">
                    <a class="navbar-brand py-0" href="/">
                        <img src="/images/light/logo_header.svg" width="140" height="44" alt="Enovel" class="logo-header">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <img src="/images/ic_top_menu.svg" alt="Menu" width="24" height="24">
                        </span>
                    </button>
                    <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarSupportedContent">
                        <ul class="navbar-nav pl-2 pl-sm-0 mt-2 mt-sm-0">
                            <li class="nav-item li-header dropdown ml-lg-4 mb-2 mb-lg-0">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="/images/light/ic_header_list.svg"  width="18" height="20" alt="Danh sách" class="img-cate-haeder">
                                    DANH SÁCH
                                </a>
                                <div class="dropdown-menu dropdown-menu-category" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item update-item" href="/truyen-moi-cap-nhat">BĐS mới đăng bán</a>
                                <a class="dropdown-item full-item" href="/truyen-da-hoan-thanh">BĐS đã bán</a>
                                <a class="dropdown-item hot-item" href="/truyen-noi-bat">BĐS nổi bật</a>
                                </div>
                            </li>
                            <li class="nav-item li-header dropdown ml-lg-4 mb-3 mb-lg-0">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="/images/light/ic_header_category.svg" width="18" height="18" alt="Thể loại" class="img-type-haeder" >
                                    THỂ LOẠI
                                </a>
                                <div class="dropdown-menu dropdown-menu-type" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach($cache_types as $type)
                                        <a class="dropdown-item  dropdown-item-type" data-type="{{$type->name}}" href="/the-loai/{{$type->slug}}">{{$type->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                        <div class="dark-light-mode mb-3 mb-lg-0 pl-2 pl-sm-0">
                            <div class="btn-light light-on ">
                                <span class="mr-1 text-no-wrap">TẮT ĐÈN</span>
                                <img src="/images/light/btn_light_off.svg" alt="Tắt" width="20" height="20">
                            </div>

                            <div class="btn-light light-off">
                                <span class="mr-1 text-no-wrap">BẬT ĐÈN</span>
                                <img src="/images/light/btn_light_on.svg" alt="Bật" width="20" height="20">
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="ajax_waiting"></div>
    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="footer-top pb-4">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <div class="row">
                            <a href="/" class="col-12">
                                <img src="/images/light/logo_header.svg" width="240" height="80" alt="Enovel" class="logo-footer">
                            </a>
                            <div class="down-app col-12">
                            </div>
                            <div class="social col-12 mt-3 d-flex">
                                <span class="pr-3">Theo dõi chúng tôi</span>
                                <div class="social-icon-list">
                                    <a href="" class="social-item">
                                        <img src="/images/light/ic_social_insta.svg"  width="30" height="30" alt="Instagram" >
                                    </a>
                                    <a href="" class="social-item">
                                        <img src="/images/light/ic_social_facebook.svg"  width="30" height="30" alt="Facebook" >
                                    </a>
                                    <a href="" class="social-item">
                                        <img src="/images/light/ic_social_twitter.svg"  width="30" height="30" alt="Twitter" >
                                    </a>
                                    <a href="" class="social-item">
                                        <img src="/images/light/ic_social_youtube.svg"  width="30" height="30" alt="Youtube" >
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 mt-3 mt-lg-0">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="more-info">
                                    <h3 class="title">TEAMS</h3>
                                    <ul >
                                        <li class="item"><a href="/truyen-da-hoan-thanh">BĐS đã bán</a></li>
                                        <li class="item"><a href="/truyen-moi-cap-nhat">BĐS mới đăng bán</a></li>
                                        <li class="item"><a href="/truyen-noi-bat">BĐS nổi bật</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="more-info">
                                    <h3 class="title">CONTACTS</h3>
                                    <ul >
                                        <li class="item"><a href="">Liên hệ</a></li>
                                        <li class="item"><a href="">Chính sách điều khoản</a></li>
                                        <li class="item"><a href="">Bảo mật</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="more-info">
                                    <h3 class="title">HELPS</h3>
                                    <ul >
                                        <li class="item"><a href="">Hướng dẫn</a></li>
                                        <li class="item"><a href="">Giới thiệu</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">TOH eBook</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <script>
        $("img").lazyload({
            effect : "fadeIn"
        });
         if($("#pac-input").val()=='') {
            $('.delete-search').css('display','none')
        }else {
            $('.delete-search').css('display','block')
        }
        $( document ).ready(function() {
            if(document.body.scrollHeight <= 1080){
                var x = $(document).height();
                var y = $('header').height();
                var z = $('footer').height();
                x=x-y-z-40;
                $('#min-height').css('min-height',x);
            }

            $('.dark-light-mode').on('click', function(){
                let dark = Cookies.get('dark')
                if(dark == null) {
                    dark = 0;
                }
                dark++;
                Cookies.set('dark',dark)
                if(dark % 2==0) {
                    $('body').removeClass('dark')
                }else {
                    $('body').addClass('dark')
                }
            })

            function delay(callback, ms) {
                var timer = 0;
                return function() {
                    var context = this, args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                    callback.apply(context, args);
                    }, ms || 0);
                };
            }
            $('#pac-input').keyup(delay(function (e) {
                search()
            }, 500));

            function search() {
                var search = $('#pac-input').val();
                search = search.trim();

                if (search.length >= 3) {
                    var data = {
                        search: search
                    };

                    $.ajax({
                        method : "GET",
                        url: "/ajax/search",
                        data: data,
                        success: function(response) {
                            $('.dropdown-result-search').show();
                            $('.dropdown-result-search ul').html('');
                            $('.dropdown-result-search ul').addClass('list-item');
                            $.each(response.results, function (key, val) {
                                if(key<3) {
                                    var link = "/chi-tiet/" + val.slug;
                                    $('.dropdown-result-search ul').append('<li><a class= "text-1-line" href="'+ link +'">'+ val.name +'</a></li>');
                                }
                            });
                            let url = "/ket-qua?" + "tukhoa=" + search;
                            if(response.results.length > 3) {
                                $('.dropdown-result-search ul').append('<li><a href = "'+ url +'" class="text-warning">'+ (response.results.length - 3) + '  kết quả khác' + '</a></li>');
                            }
                            if(response.results.length < 1) {
                                $('.dropdown-result-search ul').append('<li class="text-danger">Không tìm thấy kết quả nào phù hợp</li>');
                            }
                        },
                        error: function(data) {
                        }
                    });
                } else {
                    $('.dropdown-result-search').show();
                    $('.dropdown-result-search ul').html('');
                    $('.dropdown-result-search ul').addClass('list-item');
                    $('.dropdown-result-search ul').append('<li class="text-warning">Từ khóa quá ngắn, vui lòng tìm từ khóa dài hơn 3 ký tự</li>');
                }
            }

            $("body").mouseup(function(e) {
                var subject = $("#dropdown-result");
                if (e.target.id != subject.attr('id') && !subject.has(e.target).length) {
                    $('.dropdown-result-search').hide();
                }
            })

            $('.delete-search').click(function(e) {
                $('#pac-input').val('')
                $('#pac-input').focus()
                if($('.dropdown-result-search').height() > 20) {
                    $('.dropdown-result-search').show()
                }
                $(this).css('display', 'none')
            })

            $("#pac-input").change(function(){
                if($(this).val()=='') {
                    $('.delete-search').css('display','none')
                }else {
                    $('.delete-search').css('display','block')
                }
            })

            $("#pac-input").keyup(function(){
                if($(this).val()=='') {
                    $('.delete-search').css('display','none')
                }else {
                    $('.delete-search').css('display','block')
                }
            })

            $('.option-item').click(function(e) {
                e.stopPropagation();
                let $pick = $('.'+ $(this).attr('data-pick'))
                if($pick.hasClass('d-none')) {
                    $.when($('.list-pick').addClass('d-none')).done(function() {
                        $pick.removeClass('d-none')
                    })
                } else {
                    $pick.addClass('d-none')
                }
            })

            $('body').click(function(e) {
                $('.list-pick').each(function(index,value) {
                    if(($(this).hasClass('d-none'))) {
                    }else {
                        $(this).addClass('d-none')
                    }
                })
            })
        })

        $('.btn').mouseleave(function(){
            $(this).css('box-shadow','none')
        })

        $('.btn').mouseover(function(){
            $(this).css('box-shadow',' 0 0 0 2px rgb(0 123 255 / 20%)')
        })
    </script>
</body>
</html>
