@extends('layouts.app')
@section('title','BĐS đã bán, truyện hay')
@section('content')
<div class="find-novel container pt-36" id="min-height">
    <div class="title">
        <a href="/">
            <img src="/images/light/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-off img-home">
            <img src="/images/dark/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-on img-home">
        </a>
        <span class="white">/</span>
        <a class="text-warning" href="/truyen-da-hoan-thanh">BĐS đã bán</a> 
    </div>
    <div  style="position:relative;">
        <div class="option-list text-000-4 mt-4">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="option-item mt-3 mt-lg-0 option-type" data-pick="list-type-pick">
                        <div class="d-flex justify-content-between ">
                            <div class="align-items-center d-flex">
                                <img src="/images/light/ic_detail_category.svg" alt="Thể loại" width="18" height="18" class=" mt-2px">
                                <span class="ml-1">Thể loại</span>
                            </div>
                            <div class="align-items-center d-flex">
                                <span class="mr-1 text-blue f-550">Chọn thể loại</span>
                                <img src="/images/light/ic_filter_dropdown_inactive.svg" alt="Xuống" width="14" height="12" class="mt-2px dark">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 " style="position: relative;" >
                    <div class="option-item opacity-5 mt-3 mt-lg-0 option-status pe-none" data-pick="list-status-pick">
                        <div class="d-flex justify-content-between ">
                            <div class="align-items-center d-flex">
                                <img src="/images/light/ic_filter_status_inactive.svg" alt="Trạng thái" width="18" height="18" class=" mt-2px">
                                <span class="ml-1">Trạng thái</span>
                            </div>
                            <div class="align-items-center d-flex">
                                <span class="mr-1 text-blue f-550">Chọn trạng thái</span>
                                <img src="/images/light/ic_filter_dropdown_inactive.svg" alt="Xuống" width="14" height="12" class="mt-2px dark">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style="position: relative;"> 
                    <div class="option-item mt-3 mt-lg-0 option-number-chap" data-pick="list-number-chap-pick ">
                        <div class="d-flex justify-content-between ">
                            <div class="align-items-center d-flex">
                                <img src="/images/light/ic_filter_chapter_inactive.svg" alt="Chương" width="16" height="16" class=" mt-2px">
                                <span class="ml-1">Số chương</span>
                            </div>
                            <div class="align-items-center d-flex">
                                <span class="mr-1 text-blue f-550">Chọn số chương</span>
                                <img src="/images/light/ic_filter_dropdown_inactive.svg" alt="Xuống" width="14" height="12" class="mt-2px dark">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-number-chap-pick d-none list-pick py-2 px-4 w-100">
                            <div class="item" id="chapter-1">
                                <input type="checkbox" class="check-box-chapter" data-id="1" id="checkbok-number-chap-1">
                                <label for="checkbok-number-chap-1" class="d-flex label-type label-number-chap">
                                    <img src="/images/light/ic_filter_checkbox_active.svg" width="18" height="18" alt="Đã chọn" class="type-active">
                                    <img src="/images/light/ic_filter_checkbox_inactive.svg" width="18" height="18" alt="Chưa chọn" class="type-inactive ">
                                    <span class="ml-4 type">Dưới 100 chương</span>
                                </label>
                            </div>
                            <div class="item" id="chapter-2">
                                <input type="checkbox" class="check-box-chapter" data-id="2" id="checkbok-number-chap-2">
                                <label for="checkbok-number-chap-2" class="d-flex label-type label-number-chap">
                                    <img src="/images/light/ic_filter_checkbox_active.svg" width="18" height="18" alt="Đã chọn" class="type-active">
                                    <img src="/images/light/ic_filter_checkbox_inactive.svg" width="18" height="18" alt="Chưa chọn" class="type-inactive ">
                                    <span class="ml-4 type">100 - 500 chương</span>
                                </label>
                            </div>
                            <div class="item" id="chapter-3">
                                <input type="checkbox" class="check-box-chapter" data-id="3" id="checkbok-number-chap-3">
                                <label for="checkbok-number-chap-3" class="d-flex label-type label-number-chap">
                                    <img src="/images/light/ic_filter_checkbox_active.svg" width="18" height="18" alt="Đã chọn" class="type-active">
                                    <img src="/images/light/ic_filter_checkbox_inactive.svg" width="18" height="18" alt="Chưa chọn" class="type-inactive ">
                                    <span class="ml-4 type">500 - 1000 chương</span>
                                </label>
                            </div>
                            <div class="item" id="chapter-4">
                                <input type="checkbox" class="check-box-chapter" data-id="4" id="checkbok-number-chap-4">
                                <label for="checkbok-number-chap-4" class="d-flex label-type label-number-chap">
                                    <img src="/images/light/ic_filter_checkbox_active.svg" width="18" height="18" alt="Đã chọn" class="type-active">
                                    <img src="/images/light/ic_filter_checkbox_inactive.svg" width="18" height="18" alt="Chưa chọn" class="type-inactive ">
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
                <li class="picked-item mr-3 mb-2 ">
                    <div class="d-flex justify-content-center align-items-center 1 no-x" >
                        <span>Hoàn thành</span>
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
                        <img src="/images/light/ic_filter_checkbox_active.svg" width="18" height="18" alt="Đã chọn" class="type-active">
                        <img src="/images/light/ic_filter_checkbox_inactive.svg" width="18" height="18" alt="Chưa chọn" class="type-inactive ">
                        <span class="ml-4 type">{{$val->name}}</span>
                    </label>
                </div>
                @endforeach
            </div>
        </div>  
    </div>
    <div class="content mt-4">
        <div class="row">
            @if($datas->count() > 0)
            @foreach($datas as $data)
            <div class="col-lg-6 mb-3 mb-lg-4">
                <a class="item-list-novel " href="/chi-tiet/{{$data->slug}}">
                    <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-2-3">
                    <div class="item-content pr-4 over-hidden">
                        <h5 class="name text-2-line">
                            {{$data->name}}
                        </h5>
                        <div class="d-flex justify-content-between mt-3">
                            <div class="author align-items-center d-flex">
                                <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                                <span class="ml-1 text-000-4 text-1-line">{{$data->author->name}}</span>
                            </div>
                            <div class="star align-items-center d-flex ">
                                <img src="/images/light/ic_chapter_gray.svg" alt="Chương" width="16" height="16" class="mt-2px ">
                                <span class="ml-1 text-000-4 text-no-wrap">{{$data->number_last}}</span>
                            </div>
                        </div>
                        <div class="des text-000-4 mt-3 text-3-line">
                            {!!$data->content!!} 
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-12 d-flex pagination">
                @include('pagination', ['paginator' => $datas->appends(request()->input())])
            </div>
            @else
            <div class="col-12 text-noti-none text-danger h5">
                Không có truyện nào phù hợp
            </div>
            @endif
        </div>
    </div>       
</div>

<script>
    $( document ).ready(function() {
        $('.dropdown-menu-category .full-item').addClass('active')
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
            $( ".check-box-type" ).off( "click");
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
                var url = "/truyen-da-hoan-thanh?";
                if(chapter > 0){
                    url = url + "chapter=" + chapter;
                    url = url + "&type=" + array_type;
                }else{
                    url = url + "type=" + array_type;
                }
            }else {
                var url = "/truyen-da-hoan-thanh?";
                if(chapter > 0){
                    url = url + "chapter=" + chapter;
                    url = url + "&type=" + array_type;
                }else{
                    url = url + "type=" + array_type;
                }
            }
            window.location.href = url;
        })

        $('#chapter-' + chapter + ' .label-type').toggleClass('text-blue');
        $('#chapter-' + chapter + ' .type-inactive').toggleClass('d-none');
        $('.check-box-chapter').click(function(){
            $( ".check-box-chapter" ).off( "click");
            if(chapter !=  $(this).attr("data-id")){
                $('.list-number-chap-pick .label-number-chap').removeClass('text-blue');
                $('.list-number-chap-pick .label-number-chap .type-inactive').removeClass('d-none');
                $('#chapter-' + $(this).attr("data-id") + ' .label-type').toggleClass('text-blue');
                $('#chapter-' + $(this).attr("data-id") + ' .type-inactive').toggleClass('d-none');
                chapter =  $(this).attr("data-id");
                var url = "/truyen-da-hoan-thanh?"
                url = url + "chapter=" + chapter;
                if(array_type.length > 0){
                    url = url + "&type=" + array_type;
                }
            }else {
                var url = "/truyen-da-hoan-thanh?"
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
            $( ".btn-delete-type" ).off( "click");
            let id_type = $(this).attr("data-btn")
            $.each( array_type, function(index, value) {
                if(value == id_type) {
                    array_type.splice(index, 1);
                    check = 1; 
                }
            })
            var url = "/truyen-da-hoan-thanh?"
            if (chapter > 0) {
                url = url + "&chapter=" + chapter;
            }
            if(array_type.length > 0) {
                url = url + "&type=" + array_type;
            }
            
            window.location.href = url;
        })

        $('.btn-delete-chap').click(function() {
            $( ".btn-delete-chap" ).off( "click");
            var url = "/truyen-da-hoan-thanh?"
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
    });
  
</script>
@endsection