@extends('layouts.app_'.$dark_light)
@section('title',$story->name  .' - '.$chapter->name)
@section('content')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="Ed5Z1UUs"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.js" integrity="sha512-vDRRSInpSrdiN5LfDsexCr56x9mAO3WrKn8ZpIM77alA24mAH3DYkGVSIq0mT5coyfgOlTbFyBSUG7tjqdNkNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="read-novel pt-36">
    <div class="container">
        <div class="title d-flex justify-content-between  flex-column flex-lg-row">
            <div class="d-flex box-name ">
                <a href="/" class="home-read-novel">
                    </a>
                <span class="mx-1">/</span>
                <p class="text-1-line name-chap mb-0">
                    <a class="name-detail  text-warning " href="/chi-tiet/{{$story->slug}}">{{$story->name}}</a>
                    <span class="">/</span>
                    <a class=" text-warning" href="/{{$story->slug}}/{!!$chapter->slug!!}">{{\App\Helpers\Helper::convertName($chapter->name)}}</a>
                </p>
            </div>
            <div class="d-flex align-items-center date-newest mt-lg-0 mt-2">
                <span class="ml-1 text-1-line font-20" style="min-width:100px">{{date('Y-m-d', strtotime($chapter->created_at))}}</span>
            </div>
        </div>
        <div class="py-4">
            @include('layouts.ads.banner_1')
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-sm-10 offset-sm-1">
                        <div class="direc-chap mb-4">
                            <div class="direc-chap-btn ">
                                <a href="/{{$story->slug}}/{!!$chapter->prev_chap!!}" class="btn btn-prev-chap btn-chap w-100  <?php echo ($chapter->prev_chap === 'javascript:void(0)') ? 'disabled' : '' ?>">
                                    <img src="/images/light/ic_reading_prev.svg" alt="Prev" width="8" height="14" class="mb-3px mr-md-2 mr-0">
                                    <span class="d-none d-md-inline-block">Chương trước</span>
                                </a>
                            </div>
                            <div class="direc-chap-btn direc-chap-btn-center">
                                <div class="icon-load-chap btn w-100 h-100" data-id-story="{{$story->id}}">
                                    <img src="/images/ic_top_menu.svg" width="26px" height="26px">
                                </div>
                            </div>
                            <div class="direc-chap-btn">
                                <a href="/{{$story->slug}}/{!!$chapter->next_chap!!}" class="btn btn-next-chap btn-chap <?php echo empty($chapter_news) ? 'disabled' : '' ?> w-100">
                                    <span class="d-none d-md-inline-block">Chương sau</span>
                                    <img src="/images/light/ic_reading_next.svg" alt="Next" width="8" height="14" class="mb-3px ml-md-2 ml-0">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-container">
        <div class="row row-read">
            <div class="col-lg-2">
                @include('layouts.ads.banner_2')
            </div>
            <div class="col-lg-10 col-read">
                <div class="wrap-read">
                    <div class="box-read">
                        <div class="box-wrap-action">
                            <div class="box-action" id="action">
                                <ul class="list-action">
                                    <li class="item" id="scrollToBottom" data-toggle="tooltip" data-placement="right" title="Bình luận"></li>
                                    <li class="item border-bottom" id="item-setting" data-toggle="tooltip" data-placement="right" title="Cài đặt đọc truyện">
                                        <div class="read-setting">
                                            <button class="btn btn-close-setting">
                                                <img src="/images/light/ic_detail_tool_close.svg" alt="Đóng">
                                            </button>
                                            <div class="p-4">
                                                <div class="title">Cài đặt</div>
                                                <table class="table-setting w-100">
                                                    <tbody>
                                                        <tr class="mt-3">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <img src="/images/light/ic_detail_tool_color.svg" alt="Màu" class="img-setting-change">
                                                                    <span class="ml-2">Màu nền</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="theme-list">
                                                                    <div class="theme-item theme-item-1" data-theme="theme-1">
                                                                    </div>
                                                                    <div class="theme-item theme-item-2" data-theme="theme-2">
                                                                    </div>
                                                                    <div class="theme-item theme-item-3" data-theme="theme-3">
                                                                    </div>
                                                                    <div class="theme-item theme-item-4" data-theme="theme-4">
                                                                    </div>
                                                                    <div class="theme-item theme-item-5" data-theme="theme-5">
                                                                    </div>
                                                                    <div class="theme-item theme-item-6" data-theme="theme-6">
                                                                    </div>
                                                                    <div class="theme-item theme-item-7"data-theme="theme-7" >
                                                                    </div>
                                                                    <div class="theme-item theme-item-8 active" data-theme="theme-8">
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="mt-3">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <img src="/images/light/ic_detail_tool_text_font.svg" alt="Font chữ" class="img-setting-change" >
                                                                    <span class="ml-2">Font chữ</span>
                                                                </div>
                                                            </td>
                                                            <td style="position: relative;">
                                                                <select  class="select-font w-100">
                                                                    <option value="'Palatino Linotype', sans-serif"> Palatino Linotype </option>
                                                                    <option value="'Source Sans Pro', sans-serif">Source Sans Pro </option>
                                                                    <option value="'Segoe UI', sans-serif">Segoe UI</option>
                                                                    <option value="Roboto, sans-serif">Roboto</option>
                                                                    <option value="'Patrick Hand', sans-serif">Patrick Hand</option>
                                                                    <option value="'Noticia Text', sans-serif">Noticia Text</option>
                                                                    <option value="'Times New Roman', sans-serif">Times New Roman </option>
                                                                    <option value="Verdana, sans-serif">Verdana</option>
                                                                    <option value="Tahoma, sans-serif">Tahoma</option>
                                                                    <option value="Arial, sans-serif">Arial</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr class="mt-3">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <img src="/images/light/ic_detail_tool_text_size.svg" alt="Cỡ chữ" class="img-setting-change">
                                                                    <span class="ml-2">Cỡ chữ</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-between">
                                                                    <button class="btn btn-subtract-size-text">
                                                                        <img src="/images/light/ic_detail_tool_text_minus.svg" alt="Giảm cỡ chữ" >
                                                                    </button>
                                                                    <div class="value value-size-text d-flex justify-content-center align-items-center">
                                                                       20px
                                                                    </div>
                                                                    <button class="btn btn-plus-size-text">
                                                                        <img src="/images/light/ic_detail_tool_text_add.svg" alt="Tăng cỡ chữ" >
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="mt-3">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <img src="/images/light/ic_detail_tool_text_width.svg" alt="Rộng khung" class="img-setting-change">
                                                                    <span class="ml-2">Chiều rộng khung</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-between">
                                                                    <button class="btn btn-subtract-width">
                                                                        <img src="/images/light/ic_detail_tool_text_minus.svg" alt="Giảm rộng khung" >
                                                                    </button>
                                                                    <div class="value value-width d-flex justify-content-center align-items-center">
                                                                        1000px
                                                                    </div>
                                                                    <button class="btn btn-plus-width">
                                                                        <img src="/images/light/ic_detail_tool_text_add.svg" alt="Tăng rộng khung" >
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="mt-3">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <img src="/images/light/ic_detail_tool_text_spacing.svg" alt="Giãn dòng" class="img-setting-change">
                                                                    <span class="ml-2">Giãn dòng</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-between">
                                                                    <button class="btn btn-subtract-line-height">
                                                                        <img src="/images/light/ic_detail_tool_text_minus.svg" alt="Giảm giãn dòng" >
                                                                    </button>
                                                                    <div class="value value-line-height d-flex justify-content-center align-items-center">
                                                                        130%
                                                                    </div>
                                                                    <button class="btn btn-plus-line-height">
                                                                        <img src="/images/light/ic_detail_tool_text_add.svg" alt="Tăng giãn dòng" >
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item" data-toggle="modal" data-target="#reportModal">
                                        <div class="w-100 h-100 btn-report" data-toggle="tooltip" data-placement="right" title="Báo cáo"></div>
                                    </li>
                                    <!-- <li class="item scroll-top" id="scrollToTop" data-toggle="tooltip" data-placement="right" title="Cuộn lên"></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="box-read-content" style ="font-size:20px;line-height:130%;font-family:'Roboto', sans-serif">
                            <p class=" read-box-name white-title" >{{$chapter->name}}</p>
                            <div id="content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-sm-10 offset-sm-1">
                        <div class="direc-chap my-4">
                            <div class="direc-chap-btn">
                                <a href="/{{$story->slug}}/{!!$chapter->prev_chap!!}" class="btn btn-prev-chap btn-chap w-100  <?php echo ($chapter->prev_chap === 'javascript:void(0)') ? 'disabled' : '' ?>">
                                    <img src="/images/light/ic_reading_prev.svg" alt="Prev" width="8" height="14" class="mb-3px mr-md-2 mr-0">
                                    <span class="d-none d-md-inline-block">Chương trước</span>
                                </a>
                            </div>
                            <div class="direc-chap-btn direc-chap-btn-center">
                                <div class="icon-load-chap btn w-100 h-100" data-id-story="{{$story->id}}">
                                    <img src="/images/ic_top_menu.svg" width="26px" height="26px">
                                </div>
                            </div>
                            <div class="direc-chap-btn">
                                <a href="/{{$story->slug}}/{!!$chapter->next_chap!!}" class="btn btn-next-chap btn-chap <?php echo empty($chapter_news) ? 'disabled' : '' ?> w-100">
                                    <span class="d-none d-md-inline-block">Chương sau</span>
                                    <img src="/images/light/ic_reading_next.svg" width="8" height="14" alt="Next" class="mb-3px ml-md-2 ml-0">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div >
            <div class="title">
                <span>Bình luận</span>
            </div>
            <div class="fb-comments" data-href="http://127.0.0.1/chi-tiet/{{$story->slug}}" data-width="100%" data-numposts="10"  data-order-by="reverse_time"></div>
        </div>
    </div>
</div>
<div class="box-action w-100 " id="action-mobile">
    <div class="w-100 read-setting read-setting-mb d-none">
        <button class="btn btn-close-setting">
            <img src="/images/light/ic_detail_tool_close.svg" alt="Đóng">
        </button>
        <div class="p-4">
            <div class="title">Cài đặt</div>
            <table class="table-setting w-100">
                <tbody>
                    <tr class="mt-3">
                        <td>
                            <div class="d-flex">
                                <img src="/images/light/ic_detail_tool_color.svg" alt="Màu" class="img-setting-change">
                                <span class="ml-2">Màu nền</span>
                            </div>
                        </td>
                        <td>
                            <div class="theme-list">
                                <div class="theme-item theme-item-1" data-theme="theme-1">
                                </div>
                                <div class="theme-item theme-item-2" data-theme="theme-2">
                                </div>
                                <div class="theme-item theme-item-3" data-theme="theme-3">
                                </div>
                                <div class="theme-item theme-item-4" data-theme="theme-4">
                                </div>
                                <div class="theme-item theme-item-5" data-theme="theme-5">
                                </div>
                                <div class="theme-item theme-item-6" data-theme="theme-6">
                                </div>
                                <div class="theme-item theme-item-7"data-theme="theme-7" >
                                </div>
                                <div class="theme-item theme-item-8 active" data-theme="theme-8">
                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr class="mt-3">
                        <td>
                            <div class="d-flex">
                                <img src="/images/light/ic_detail_tool_text_font.svg" alt="Font chữ" class="img-setting-change">
                                <span class="ml-2">Font chữ</span>
                            </div>
                        </td>
                        <td style="position: relative;">
                            <select  class="select-font w-100">
                                <option value="'Palatino Linotype', sans-serif"> Palatino Linotype </option>
                                <option value="'Source Sans Pro', sans-serif">Source Sans Pro </option>
                                <option value="'Segoe UI', sans-serif">Segoe UI</option>
                                <option value="Roboto, sans-serif">Roboto</option>
                                <option value="'Patrick Hand', sans-serif">Patrick Hand</option>
                                <option value="'Noticia Text', sans-serif">Noticia Text</option>
                                <option value="'Times New Roman', sans-serif">Times New Roman </option>
                                <option value="Verdana, sans-serif">Verdana</option>
                                <option value="Tahoma, sans-serif">Tahoma</option>
                                <option value="Arial, sans-serif">Arial</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="mt-3">
                        <td>
                            <div class="d-flex">
                                <img src="/images/light/ic_detail_tool_text_size.svg" alt="Cỡ chữ" class="img-setting-change">
                                <span class="ml-2">Cỡ chữ</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-subtract-size-text">
                                    <img src="/images/light/ic_detail_tool_text_minus.svg" alt="Giảm cỡ chữ" >
                                </button>
                                <div class="value value-size-text d-flex justify-content-center align-items-center">
                                    20px
                                </div>
                                <button class="btn btn-plus-size-text">
                                    <img src="/images/light/ic_detail_tool_text_add.svg" alt="Tăng cỡ chữ" >
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="mt-3">
                        <td>
                            <div class="d-flex">
                                <img src="/images/light/ic_detail_tool_text_spacing.svg" alt="Giãn dòng" class="img-setting-change">
                                <span class="ml-2">Giãn dòng</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-subtract-line-height">
                                    <img src="/images/light/ic_detail_tool_text_minus.svg" alt="Giảm giãn dòng" >
                                </button>
                                <div class="value value-line-height d-flex justify-content-center align-items-center">
                                    130%
                                </div>
                                <button class="btn btn-plus-line-height">
                                    <img src="/images/light/ic_detail_tool_text_add.svg" alt="Tăng giãn dòng" >
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <ul class="list-action list-action-mb mb-0 have-border" style="display:flex;animation: fadeIn linear .3s;">
        <li class="item" id="scrollToBottom-mb"></li>
        <li class="item border-right" id="item-setting-mb">
        </li>
        <li class="item btn-report btn" data-toggle="modal" data-target="#reportModal"></li>
        <!-- <li class="item scroll-top" id="scrollToTopMb"></li> -->
    </ul>
</div>

<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Báo cáo chương lỗi</h5>
      </div>
      <div class="modal-body">
        <textarea  id="report" cols="30" rows="6" class="w-100 px-4 py-3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-close-report" data-dismiss="modal">Hủy</button>
        <button data-id-story="{{$story->id}}" data-chap="{{$chapter->id}}" type="button" class="btn btn-primary px-4 send-report">Gửi</button>
      </div>
    </div>
  </div>
</div>
<div class="scroll-top btn p-0">
        <img src="/images/btn_up.svg" alt="Cuộn lên" width="45" height="45">
</div>

<script>
    var slug =  <?=json_encode($chapter->slug)?>;
    var slug_prev =  <?=json_encode($chapter->prev_chap)?>;
    var slug_next =  <?=json_encode($chapter->next_chap)?>;
    var story = <?=json_encode($story->slug)?>;
    var url_dropbox = <?=json_encode($chapter->dropbox)?>;

    if(url_dropbox!=null) {
        var url = url_dropbox.replace("www.dropbox","dl.dropboxusercontent");
        var request = $.ajax({
            url: url,
            method: "GET",
            beforeSend: function(){
                // Handle the beforeSend event
                $('.loader').css('display', 'block');
            },
            complete: function(){
                // Handle the complete event
                $('.loader').css('display', 'none');
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){

                }else{
                    printErrorMsg(data.error);
                }
            },
            dataType: "html"
        });

        request.done(function( msg ) {
            $("#content").html(msg);
        });

        request.fail(function( jqXHR, textStatus ) {
            $.alert({
                title: 'Alert!',
                content: 'Error!',
            });
        });
    }

    $(document).keydown(function(e){
        let code = e.which
        if(slug_prev != 'javascript:void(0)' && code == 37) {
            let  url = '/' + story +  '/'+ slug_prev;
            window.location.href = url;
        }
        if(slug_next != 'javascript:void(0)' && code == 39) {
            let  url = '/' + story +  '/'+ slug_next;
            window.location.href = url;
        }
    })
    $('.icon-load-chap').click(function(){
        let id_story = $(this).attr("data-id-story")
        $.ajaxSetup(
            {
                headers:
                {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:"GET",
            data: {
                "id_story" : id_story,
            },
            type:'GET',
            url:'/ajax/get-list-chapter',
            success:function(res) {
                var html = '';
                var option ='';
                $.each(res.list_chapter, function(key, value) {
                    var arr_name = value.name.split(":");
                    if(value.slug == slug){
                        option += '<option selected value="'+value.slug+'">' + arr_name[0] ;
                    }else {
                        option += '<option  value="'+value.slug+'">' + arr_name[0] ;
                    }
                })
                html += '<select class="btn btn-select-chap btn-chap w-100" >';
                html += option;
                html += '</select>';
                $('.direc-chap-btn-center').html(html);
                $('.read-novel .direc-chap').addClass('active');
            }
        });
    })
    $(document).ready(function() {


        $(document).on('change','.btn-select-chap', function() {
            let slug = $(this).val();
            let url = '/' + story +  '/'+ slug;
            window.location.href = url;
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $('.read-setting').mouseover(function (e) {
            e.stopPropagation();
            $('#item-setting').tooltip('hide')
        })

        $('.read-setting').click(function (e) {
            e.stopPropagation();
            $('#item-setting').tooltip('hide')
        })

        $('#scrollToBottom').bind("click", function () {
            document.querySelector('.fb-comments').scrollIntoView({ behavior: 'smooth' })
            $('#item-setting').removeClass('active')
            $('.list-action-mb').addClass('have-border')
        });
        $('#scrollToBottom-mb').on("click", function () {
            document.querySelector('.fb-comments').scrollIntoView({ behavior: 'smooth' })
            $('.read-setting-mb').addClass('d-none')
            $('#item-setting-mb').removeClass('active')
            $('.list-action-mb').addClass('have-border')
        });

        $(document).scroll(function() {
            if($(this).scrollTop() > 300){
                   $('.box-wrap-action').css('top', '20px');
            } else{
                $('.box-wrap-action').css('top', '0px');
            }

            if ($(this).scrollTop() > 600) {
                $('.scroll-top').fadeIn();
            } else {
                $('.scroll-top').fadeOut();
            }
        })

        $('.scroll-top').click(function(){
            $('html, body').animate({scrollTop : 0},400);
            return false;
        });

        //SEND REPORT
        $('.btn-report').click(function () {
            $('.send-report').addClass('disabled')
        })

        $('.send-report').click(function () {
            let content = $('#report').val();
            if(content!=='') {
                $('#reportModal').modal('hide');
                let id_chap = $(this).attr("data-chap")
                let id_story = $(this).attr("data-id-story")
                $.ajaxSetup(
                    {
                        headers:
                        {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method:"POST",
                    data: {
                        "id_story" : id_story,
                        "id_chap" : id_chap,
                        "content" : content
                    },
                    type:'POST',
                    url:'/ajax/report',
                    success:function(res) {
                        Swal.fire({
                                icon: 'success',
                            title: 'Thành công',
                            text: "Cảm ơn bạn đã báo cáo!"
                        });
                        $('#report').val('')
                    }
                });
            }
        })

        $('#report').keyup(function(e) {
            if($(this).val()) {
                $('.send-report').removeClass('disabled')
            }else {
                $('.send-report').addClass('disabled')
            }
        })

        $('.btn-close-report').click(function() {
            $('#report').val('')
        })

        $('#item-setting').click(function(e) {
            e.stopPropagation();
            $(this).toggleClass('active')
        })

        $('#item-setting-mb').click(function(e) {
            $('.list-action-mb').toggleClass('have-border')
            e.stopPropagation();
            $(this).toggleClass('active')
            $('.read-setting-mb').toggleClass('d-none')
        })

        $('.read-setting-mb,.read-setting').click(function(e) {
            e.stopPropagation();
        })

        $('.btn-close-setting').click(function(e) {
            e.stopPropagation();
            $('#item-setting').removeClass('active')
            $('#item-setting-mb').removeClass('active')
            $('.read-setting-mb').toggleClass('d-none')
            $('.list-action-mb').addClass('have-border')
        })

        $('body').click(function() {
            if($('#item-setting,#item-setting-mb').hasClass('active')) {
                $('#item-setting,#item-setting-mb').removeClass('active')
                $('.read-setting-mb').addClass('d-none')
                $('.list-action').removeClass('d-none')
                $('.list-action-mb').addClass('have-border')
            }
            $('.list-action-mb').toggleClass('d-none')
        })

        var list_history = []
        var name = <?=json_encode($story->name)?>;
        var chap = <?=json_encode($chapter->name)?>;
        var id = <?=json_encode($story->id)?>;
        var image = <?=json_encode($story->image)?>;
        var url_story =   <?=json_encode($story->slug)?>;
        var url = window.location.href
        var history_item = {id:id, name:name, chap:chap, url:url, image:image, url_story:url_story}
        if(localStorage.getItem("History") != null) {
            list_history = JSON.parse(localStorage.getItem("History"));
            for (let i = 0; i < list_history.length; i++) {
                if(id===list_history[i].id) {
                    list_history.splice(i, 1)
                }
            }
        }
        list_history.push(history_item)
        JsonHistory = JSON.stringify(list_history)
        localStorage.setItem('History',JsonHistory)
    })

    //SETTING READ//
    var font = 'Roboto, sans-serif'
    var width = 1000;
    var theme = '';
    var sizeText = 20;
    var sizeName = 24;
    var lineHeight = 130;
    var check = function() {
        let SizeSave =  localStorage.getItem('Size');
        let LineSave =  localStorage.getItem('Line');
        let WidthSave =  localStorage.getItem('Width');
        let FontSave =  localStorage.getItem('Font');
        let SizeNameSave =  localStorage.getItem('SizeName');
        if(SizeSave!=null) {
            sizeText = SizeSave;
        }
        if(SizeNameSave!==null) {
            sizeName = SizeNameSave;
        }
        if(LineSave!=null) {
            lineHeight = LineSave;
        }
        if(WidthSave!=null) {
            width = WidthSave;
        }
        if(FontSave!=null) {
            font = FontSave;
        }

        $('.value-size-text').html(sizeText + 'px')
        $('.value-line-height').html(lineHeight + '%')
        $('.value-width').html(width + 'px')
        $('.select-font').val(font)

        if (localStorage.getItem('Theme')===NaN||localStorage.getItem('Theme')===null) {
            theme = 'theme-8'
        }else {
            theme = localStorage.getItem('Theme');
            $('.theme-item').removeClass('active')
            $('div[data-theme=' + theme + ']').addClass('active');
        }
    }

    var handleSize = function() {
        let value = sizeText + 'px';
        let value1 = sizeName + 'px';
        $('.box-read-content').css('font-size', value);
        $('.read-box-name').css('font-size', value1);
    }
    var handleLine = function() {
        let value = lineHeight + '%';
        $('.box-read-content').css('line-height', value);
    }
    var handleTheme = function() {
        $('.box-read,.read-novel,#action-mobile').removeClass('theme-1 theme-2 theme-3 theme-4 theme-5 theme-6 theme-7 theme-8')
        $('.box-read,.read-novel,#action-mobile').addClass(theme)
    }
    var handleWidth = function() {
        let value = (1000-width)/2 + 'px';
        $('.wrap-read').css('padding-right',value)
        $('.wrap-read').css('padding-left',value)
    }

    var handleFont = function() {
        $('.box-read-content').css('font-family',font)
    }

    check();
    $.when(check()).done(handleSize(),handleLine(),handleTheme(),handleWidth(),handleFont());

    $('.select-font').change(function() {
        font = $(this).children('option:selected').attr('value')
        localStorage.setItem('Font',font)
        handleFont()
    })


    $('.theme-item').click(function () {
        $('.theme-item').removeClass('active')
        $(this).addClass('active')
        theme = $(this).attr('data-theme')
        localStorage.setItem('Theme',theme)
        handleTheme()
    })


    $('.btn-subtract-size-text').click(function() {
        if(sizeText>14) {
            sizeText = parseInt(sizeText) - 1;
            sizeName = parseInt(sizeName) - 1;
            $('.value-size-text').html(sizeText + 'px')
            $('.btn-plus-size-text').removeClass('disabled')
        }else {
            $(this).addClass('disabled')
        }
        handleSize();
        localStorage.setItem('Size', sizeText);
        localStorage.setItem('SizeName', sizeName);
    })

    $('.btn-plus-size-text').click(function() {
        if(sizeText<30) {
            sizeText = parseInt(sizeText) + 1;
            sizeName = parseInt(sizeName) + 1;
            $('.value-size-text').html(sizeText + 'px')
            $('.btn-subtract-size-text').removeClass('disabled')
        }else {
            $(this).addClass('disabled')
        }
        handleSize();
        localStorage.setItem('Size', sizeText)
        localStorage.setItem('SizeName', sizeName);
    })

    $('.btn-subtract-line-height').click(function() {
        if(lineHeight>100) {
            lineHeight = parseInt(lineHeight) - 10;
            $('.value-line-height').html(lineHeight + '%')
            $('.btn-plus-line-height').removeClass('disabled')
        }
        else {
            $(this).addClass('disabled')
        }
        handleLine();
        localStorage.setItem('Line', lineHeight);
    })

    $('.btn-plus-line-height').click(function() {
        if(lineHeight<200) {
            lineHeight = parseInt(lineHeight) + 10;
            $('.value-line-height').html(lineHeight + '%')
            $('.btn-subtract-line-height').removeClass('disabled')
        }
        else {
            $(this).addClass('disabled')
        }
        handleLine()
        localStorage.setItem('Line', lineHeight)
    })

    $('.btn-subtract-width').click(function() {
        if(width>500) {
            width = parseInt(width) - 100;
            $('.value-width').html(width + 'px')
            $('.btn-plus-width').removeClass('disabled')
        }
        else {
            $(this).addClass('disabled')
        }
        handleWidth();
        localStorage.setItem('Width', width);
    })

    $('.btn-plus-width').click(function() {
        if(width<1000) {
            width = parseInt(width) + 100;
            $('.value-width').html(width + 'px')
            $('.btn-subtract-width').removeClass('disabled')
        }
        else {
            $(this).addClass('disabled')
        }
        handleWidth()
        localStorage.setItem('Width', width)
    })

</script>

@endsection
