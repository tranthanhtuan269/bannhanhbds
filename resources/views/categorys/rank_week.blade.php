@extends('layouts.app')
@section('title','BĐS nổi bật theo tuần, truyện hay')
@section('content')
<div class="detail-rank pt-36" id="min-height">
    <div class="find-novel container">
        <div class="title">
            <a href="/">
                <img src="/images/light/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-off">
                <img src="/images/dark/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-on">
            </a>
            <span class="white">/</span>
                <a class="text-warning" href="/truyen-tuan">BĐS nổi bật tuần</a>
        </div>
        <div class="title-tab mt-3">
            <ul class="nav nav-tabs tab-rank w-100">
                <li class="nav-item ">
                    <a class="nav-link  nav-all text-center" data-toggle="tab" href="#">Tất cả</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active nav-week text-center" data-toggle="tab" href="#week">Theo Tuần</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-center nav-month" data-toggle="tab" href="#">Theo Tháng</a>
                </li>
            </ul>
        </div>
        <div class="tab-content mb-5">
            <div class="tab-pane active" id="week">
                <div  style="position:relative;">
                    <div class="option-list text-000-4 mt-4">
                        <div class="row">
                            <div class="col-lg-4 ">
                                <div class="option-item mt-3 mt-lg-0 option-type" data-pick="list-type-pick">
                                    <div class="d-flex justify-content-between ">
                                        <div class="d-flex">
                                            <img src="/images/light/ic_detail_category.svg" alt="Thể loại" width="20" height="20" class=" mt-2px">
                                            <span class="ml-2">Thể loại</span>
                                        </div>
                                        <div class="d-flex text-blue f-550">
                                            <span class="mr-2">Chọn thể loại</span>
                                            <img src="/images/light/ic_filter_dropdown_inactive.svg" alt="Xuống"  width="14px" height="20px" class="mt-2px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 " style="position: relative;" >
                                <div class="option-item mt-3 mt-lg-0 option-status" data-pick="list-status-pick">
                                    <div class="d-flex justify-content-between ">
                                        <div class="d-flex">
                                            <img src="/images/light/ic_filter_status_inactive.svg" alt="Trạng thái" width="20" height="20" class=" mt-2px">
                                            <span class="ml-2">Trạng thái</span>
                                        </div>
                                        <div class="d-flex">
                                            <span class="mr-2 text-blue f-550">Chọn trạng thái</span>
                                            <img src="/images/light/ic_filter_dropdown_inactive.svg" alt="Xuống"  width="14px" height="20px" class="mt-2px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="list-status-pick d-none list-pick py-2 px-4 w-100">
                                        <div class="item" id="status-1">
                                            <input type="checkbox" class="check-box-status" data-id="1" id="checkbok-status-1">
                                            <label for="checkbok-status-1" class="d-flex label-type label-status">
                                                <img src="/images/light/ic_filter_checkbox_active.svg" alt="Đã chọn" class="type-active">
                                                <img src="/images/light/ic_filter_checkbox_inactive.svg" alt="Chưa chọn" class="type-inactive ">
                                                <span class="ml-4 type">Hoàn thành</span>
                                            </label>
                                        </div>
                                        <div class="item" id="status-0">
                                            <input type="checkbox" class="check-box-status" data-id="0" id="checkbok-status-0">
                                            <label for="checkbok-status-0" class="d-flex label-type label-status">
                                                <img src="/images/light/ic_filter_checkbox_active.svg" alt="Đã chọn" class="type-active">
                                                <img src="/images/light/ic_filter_checkbox_inactive.svg" alt="Chưa chọn" class="type-inactive ">
                                                <span class="ml-4 type">Chưa hoàn thành</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" style="position: relative;"> 
                                <div class="option-item mt-3 mt-lg-0 option-number-chap" data-pick="list-number-chap-pick ">
                                    <div class="d-flex justify-content-between ">
                                        <div class="d-flex">
                                            <img src="/images/light/ic_filter_chapter_inactive.svg" alt="Chương" width="20" height="20" class=" mt-2px">
                                            <span class="ml-2">Số chương</span>
                                        </div>
                                        <div class="d-flex">
                                            <span class="mr-2 text-blue f-550">Chọn số chương</span>
                                            <img src="/images/light/ic_filter_dropdown_inactive.svg" alt="Xuống"  width="14px" height="20px" class="mt-2px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="list-number-chap-pick d-none list-pick py-2 px-4 w-100">
                                        <div class="item" id="chapter-1">
                                            <input type="checkbox" class="check-box-chapter" data-id="1" id="checkbok-number-chap-1">
                                            <label for="checkbok-number-chap-1" class="d-flex label-type label-number-chap">
                                                <img src="/images/light/ic_filter_checkbox_active.svg" alt="Đã chọn" class="type-active">
                                                <img src="/images/light/ic_filter_checkbox_inactive.svg" alt="Chưa chọn" class="type-inactive ">
                                                <span class="ml-4 type">Dưới 100 chương</span>
                                            </label>
                                        </div>
                                        <div class="item" id="chapter-2">
                                            <input type="checkbox" class="check-box-chapter" data-id="2" id="checkbok-number-chap-2">
                                            <label for="checkbok-number-chap-2" class="d-flex label-type label-number-chap">
                                                <img src="/images/light/ic_filter_checkbox_active.svg" alt="Đã chọn" class="type-active">
                                                <img src="/images/light/ic_filter_checkbox_inactive.svg" alt="Chưa chọn" class="type-inactive ">
                                                <span class="ml-4 type">100 - 500 chương</span>
                                            </label>
                                        </div>
                                        <div class="item" id="chapter-3">
                                            <input type="checkbox" class="check-box-chapter" data-id="3" id="checkbok-number-chap-3">
                                            <label for="checkbok-number-chap-3" class="d-flex label-type label-number-chap">
                                                <img src="/images/light/ic_filter_checkbox_active.svg" alt="Đã chọn" class="type-active">
                                                <img src="/images/light/ic_filter_checkbox_inactive.svg" alt="Chưa chọn" class="type-inactive ">
                                                <span class="ml-4 type">500 - 1000 chương</span>
                                            </label>
                                        </div>
                                        <div class="item" id="chapter-4">
                                            <input type="checkbox" class="check-box-chapter" data-id="4" id="checkbok-number-chap-4">
                                            <label for="checkbok-number-chap-4" class="d-flex label-type label-number-chap">
                                                <img src="/images/light/ic_filter_checkbox_active.svg" alt="Đã chọn" class="type-active">
                                                <img src="/images/light/ic_filter_checkbox_inactive.svg" alt="Chưa chọn" class="type-inactive ">
                                                <span class="ml-4 type">Trên 1000 chương</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="data-pick my-4">
                        <ul class="list-picked d-flex flex-wrap m-0 justify-content-center">
                            @foreach ($cache_types as $val)
                            <li class="picked-item mr-3 mb-2 d-none" id="type-{{$val->id}}">
                                <div class="d-flex justify-content-between align-items-center 1" >
                                    <span class="mr-3">{{$val->name}}</span>
                                    <button class=" btn btn-delete-type d-flex" data-btn="{{$val->id}}" >
                                        <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                                    </button>
                                </div>
                            </li>
                            @endforeach
                            <li class="picked-item mr-3 mb-2 d-none" id="status-picked-1">
                                <div class="d-flex justify-content-between align-items-center 1" >
                                    <span class="mr-3">Hoàn thành</span>
                                    <button class=" btn d-flex btn-delete-status" data-btn="1"> 
                                        <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                                    </button>
                                </div>
                            </li>
                            <li class="picked-item mr-3 mb-2 d-none" id="status-picked-0">
                                <div class="d-flex justify-content-between align-items-center 1" >
                                    <span class="mr-3">Chưa hoàn thành</span>
                                    <button class=" btn d-flex btn-delete-status" data-btn="0">
                                        <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                                    </button>
                                </div>
                            </li>
                            <li class="picked-item mr-3 mb-2 d-none" id="chap-1">
                                <div class="d-flex justify-content-between align-items-center 1" >
                                    <span class="mr-3">Dưới 100 chương</span>
                                    <button class=" btn d-flex btn-delete-chap" data-btn="1">
                                        <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                                    </button>
                                </div>
                            </li>
                            <li class="picked-item mr-3 mb-2 d-none" id="chap-2">
                                <div class="d-flex justify-content-between align-items-center 1" >
                                    <span class="mr-3">100-500 chương</span>
                                    <button class=" btn d-flex btn-delete-chap" data-btn="2">
                                        <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                                    </button>
                                </div>
                            </li>
                            <li class="picked-item mr-3 mb-2 d-none" id="chap-3">
                                <div class="d-flex justify-content-between align-items-center 1" >
                                    <span class="mr-3">500-1000 chương</span>
                                    <button class=" btn d-flex btn-delete-chap" data-btn="3">
                                        <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                                    </button>
                                </div>
                            </li>
                            <li class="picked-item mr-3 mb-2 d-none" id="chap-4">
                                <div class="d-flex justify-content-between align-items-center 1" >
                                    <span class="mr-3">Trên 1000 chương</span>
                                    <button class=" btn d-flex btn-delete-chap" data-btn="4">
                                        <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="list-type-pick px-4 py-2 d-none list-pick">
                        <div class="row">
                            @foreach ($cache_types as $val)
                            <div class="col-lg-2 col-6" id="type-{{$val->id}}">
                                <input type="checkbox" class="check-box-type" data-id="{{$val->id}}" id="checkbok-type-{{$val->id}}">
                                <label for="checkbok-type-{{$val->id}}" class="d-flex label-type label-type-{{$val->id}}">
                                    <img src="/images/light/ic_filter_checkbox_active.svg" alt="Đã chọn" class="type-active">
                                    <img src="/images/light/ic_filter_checkbox_inactive.svg" alt="Chưa chọn" class="type-inactive ">
                                    <span class="ml-4 type">{{$val->name}}</span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>  
                </div>
                <div class="tab-content mt-4 ">
                    <div class="list-hot-group">
                        @foreach($datas as $key => $data)
                            @if($key==0) 
                            <div class="mb-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-1"></div>
                                    </div>
                                    <div class="info">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line ">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex">
                                                <div class="author d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="20" height="20">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star d-flex ml-3">
                                                    <img src="/images/light/ic_rating_gray.svg" alt="Đánh giá" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{number_format($data->rate/2,1)}}</span>
                                                </div>
                                            </div>
                                            <div class="des text-000-4 mt-3 text-4-line">
                                                {!!$data->content!!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @if($key==1) 
                            <div class="mb-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-2"></div>
                                    </div>
                                    <div class="info">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex">
                                                <div class="author d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="20" height="20">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star d-flex ml-3">
                                                    <img src="/images/light/ic_rating_gray.svg" alt="Đánh giá" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{number_format($data->rate/2,1)}}</span>
                                                </div>
                                            </div>
                                            <div class="des text-000-4 mt-3 text-4-line">
                                                {!!$data->content!!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @if($key==2) 
                            <div class="mb-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-3"></div>
                                    </div>
                                    <div class="info">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex">
                                                <div class="author d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="20" height="20">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star d-flex ml-3">
                                                    <img src="/images/light/ic_rating_gray.svg" alt="Đánh giá" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{number_format($data->rate/2,1)}}</span>
                                                </div>
                                            </div>
                                            <div class="des text-000-4 mt-3 text-4-line">
                                                {!!$data->content!!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @if($key>2) 
                            <div class="mb-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank ">{{$key + 1}}</div>
                                    </div>
                                    <div class="info">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex">
                                                <div class="author d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="20" height="20" class="mt-2px">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star d-flex ml-3">
                                                    <img src="/images/light/ic_rating_gray.svg" alt="Đánh giá" width="18" height="18" class="mt-2px">
                                                    <span class="ml-1 text-000-4">{{number_format($data->rate/2,1)}}</span>
                                                </div>
                                            </div>
                                            <div class="des text-000-4 mt-3 text-4-line">
                                                {!!$data->content!!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <p class="col-12 text-noti-none mb-3 d-none text-danger h5">
                            Không có truyện nào phù hợp
                        </p>
                </div>     
            </div>
        </div>
    </div>
</div>   
<script>
    $( document ).ready(function() {
        $('.dropdown-menu-category .hot-item').addClass('active')
        var length = <?=json_encode($length)?>;
        if(length==0) {
            $('.text-noti-none').removeClass('d-none')
        }
        if(length<=9) {
            $('.list-hot-group').addClass('small')
        }
        var status = <?=json_encode($status)?>;
        var chapter = <?=json_encode($chapter)?>;
        var array_type = <?=json_encode($array_type)?>;
        $.each( array_type, function(index, value) {
            $('#type-'+value).removeClass('d-none');
            $('.label-type-'+value).addClass('text-blue');
            $('.label-type-'+value+ ' .type-inactive').addClass('d-none');
        })
        $('#status-picked-'+status).removeClass('d-none');
        if (chapter>=0) {
            $('#chap-'+chapter).removeClass('d-none');
        }
        $('.check-box-type').click(function(){
            id_type = $(this).attr("data-id");
            check = 0; 
            $('#type-' + $(this).attr("data-id") + ' .label-type').toggleClass('text-blue');
            $('#type-' + $(this).attr("data-id") + ' .type-inactive').toggleClass('d-none');
            $.each( array_type, function(index, value) {
                if(value == id_type) {
                    array_type.splice(index, 1);
                    check = 1; 
                }
            })
            if(check == 0 ){
                array_type.push(id_type)
                var url = "/truyen-tuan?";
                if(status > -1){
                    url = url + "status=" + status;
                    if(chapter > 0){
                        url = url + "&chapter=" + chapter;
                    }
                    url = url + "&type=" + array_type;
                }else if(chapter > 0){
                    url = url + "chapter=" + chapter;
                    url = url + "&type=" + array_type;
                }else{
                    url = url + "type=" + array_type;
                }
            }else {
                var url = "/truyen-tuan?";
                if(status > -1){
                    url = url + "status=" + status;
                    if(chapter > 0){
                        url = url + "&chapter=" + chapter;
                    }
                    url = url + "&type=" + array_type;
                }else if(chapter > 0){
                    url = url + "chapter=" + chapter;
                    url = url + "&type=" + array_type;
                }else{
                    url = url + "type=" + array_type;
                }
            }
            window.location.href = url;
        })

        $('#status-' + status + ' .label-type').addClass('text-blue');
        $('#status-' + status + ' .type-inactive').addClass('d-none');
        
        $('.check-box-status').click(function(){
            $('.list-status-pick .label-status').removeClass('text-blue');
            $('.list-status-pick .label-status .type-inactive').removeClass('d-none');
            $('#status-' + $(this).attr("data-id") + ' .label-type').toggleClass('text-blue');
            $('#status-' + $(this).attr("data-id") + ' .type-inactive').toggleClass('d-none');
            if(status !=  $(this).attr("data-id")){
                status =  $(this).attr("data-id");
                var url = "/truyen-tuan?status=" + status
                if(chapter > 0){
                    url = url + "&chapter=" + chapter;
                }
                if(array_type.length > 0){
                    url = url + "&type=" + array_type;
                }
            }else{
                var url = "/truyen-tuan?"
                if(chapter > 0){
                    url = url + "&chapter=" + chapter;
                }
                if(array_type.length > 0){
                    url = url + "&type=" + array_type;
                }
            }
            window.location.href = url;
        })

        $('#chapter-' + chapter + ' .label-type').toggleClass('text-blue');
        $('#chapter-' + chapter + ' .type-inactive').toggleClass('d-none');
        $('.check-box-chapter').click(function(){
            if(chapter !=  $(this).attr("data-id")){
                $('.list-number-chap-pick .label-number-chap').removeClass('text-blue');
                $('.list-number-chap-pick .label-number-chap .type-inactive').removeClass('d-none');
                $('#chapter-' + $(this).attr("data-id") + ' .label-type').toggleClass('text-blue');
                $('#chapter-' + $(this).attr("data-id") + ' .type-inactive').toggleClass('d-none');
                chapter =  $(this).attr("data-id");
                var url = "/truyen-tuan?"
                if(status > -1){
                    url = url + "status=" + status
                    url = url + "&chapter=" + chapter;
                }else{
                    url = url + "&chapter=" + chapter;
                }
                if(array_type.length > 0){
                    url = url + "&type=" + array_type;
                }
            }else {
                var url = "/truyen-tuan?"
                if(status > -1){
                    url = url + "status=" + status
                }
                if(array_type.length > 0){
                    url = url + "&type=" + array_type;
                }
            }
            window.location.href = url;
        })

        $('.btn-delete-type').click(function() {
            let id_type = $(this).attr("data-btn")
            $.each( array_type, function(index, value) {
                if(value == id_type) {
                    array_type.splice(index, 1);
                    check = 1; 
                }
            })
            var url = "/truyen-tuan?"
            if(status > -1){
                url = url + "status=" + status;
            }
            if (chapter > 0) {
                url = url + "&chapter=" + chapter;
            }
            if(array_type.length > 0) {
                url = url + "&type=" + array_type;
            }
            
            window.location.href = url;
        })

        $('.btn-delete-status').click(function() {
            var url = "/truyen-tuan?"
            if(chapter > 0) {
                url = url + "chapter=" + chapter;
            } 
            if(array_type.length > 0) {
                url = url + "&type=" + array_type;
            }
            window.location.href = url;
        })

        $('.btn-delete-chap').click(function() {
            var url = "/truyen-tuan?"
            if(status > -1){
                url = url + "status=" + status;
            }
            if (array_type.length > 0) {
                url = url + "&type=" + array_type;
            }
            window.location.href = url;
        })

        $('.option-item').click(function() {
            let $pick = $('.'+ $(this).attr('data-pick')) 
            if($pick.hasClass('d-none')) {
                    $.when($('.list-pick').addClass('d-none')).done(function() {
                    $pick.removeClass('d-none')
                    })
            } else {
                $pick.addClass('d-none')
            }
        })

        $('.nav-all').click(function() {
            let url = '/truyen-hot';
            if(status > -1){
                url = url + "?status=" + status;
                if(chapter > 0){
                    url = url + "&chapter=" + chapter;
                }
                if(array_type.length > 0) {
                    url = url + "&type=" + array_type;
                }
            }else if(chapter > 0){
                url = url + "?chapter=" + chapter;
                if(array_type.length > 0) {
                    url = url + "&type=" + array_type;
                }
            }else if(array_type.length > 0) {
                url = url + "?type=" + array_type;
            }
            window.location.href = url;
        })

        $('.nav-month').click(function() {
            let url = '/truyen-thang';
            if(status > -1){
                url = url + "?status=" + status;
                if(chapter > 0){
                    url = url + "&chapter=" + chapter;
                }
                if(array_type.length > 0) {
                    url = url + "&type=" + array_type;
                }
            }else if(chapter > 0){
                url = url + "?chapter=" + chapter;
                if(array_type.length > 0) {
                    url = url + "&type=" + array_type;
                }
            }else if(array_type.length > 0) {
                url = url + "?type=" + array_type;
            }
            window.location.href = url;
        })

    });
  
</script>
@endsection