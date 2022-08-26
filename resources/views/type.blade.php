@extends('layouts.app_'.$dark_light)
@section('title','Thể loại ' .' - '.$type->name)
@section('content')
<div class="find-novel container pt-36" id="min-height">
    <div class="title">
        <a href="/">
            <img src="/images/light/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-off img-home">
            <img src="/images/dark/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-on img-home">
        </a>
        <span class="white">/</span>
        <a class="text-warning" href="/the-loai/{{$type->slug}}">{{$type->name}}</a>
    </div>
    <div  style="position:relative;">
        <div class="option-list text-000-4 mt-4">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="option-item mt-3 opacity-5 mt-lg-0 option-type pe-none" data-pick="list-type-pick">
                        <div class="d-flex justify-content-between ">
                            <div class="align-items-center d-flex">
                                <img src="/images/light/ic_detail_category.svg" alt="Thể loại" width="18" height="18" class=" mt-2px">
                                <span class="ml-1">Thể loại</span>
                            </div>
                            <div class="align-items-center d-flex">
                                <span class="mr-1 text-blue f-550">Chọn thể loại</span>
                                <img src="/images/light/ic_filter_dropdown_inactive.svg" alt="Xuống" width="14" height="12" class="mt-2px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 " style="position: relative;" >
                    <div class="option-item mt-3 mt-lg-0 option-status" data-pick="list-status-pick">
                        <div class="d-flex justify-content-between ">
                            <div class="align-items-center d-flex">
                                <img src="/images/light/ic_filter_status_inactive.svg" alt="Trạng thái" width="18" height="18" class=" mt-2px">
                                <span class="ml-1">Trạng thái</span>
                            </div>
                            <div class="align-items-center d-flex">
                                <span class="mr-1 text-blue f-550">Chọn trạng thái</span>
                                <img src="/images/light/ic_filter_dropdown_inactive.svg" alt="Xuống" width="14" height="12" class="mt-2px">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-status-pick d-none list-pick py-2 px-4 w-100">
                            <div class="item" id="status-1">
                                <input type="checkbox" class="check-box-status" data-id="1" id="checkbok-status-1">
                                <label for="checkbok-status-1" class="d-flex label-type label-status">
                                    <img src="/images/light/ic_filter_checkbox_active.svg" width="18" height="18" alt="Đã chọn" class="type-active">
                                    <img src="/images/light/ic_filter_checkbox_inactive.svg" width="18" height="18" alt="Chưa chọn" class="type-inactive ">
                                    <span class="ml-4 type">Hoàn thành</span>
                                </label>
                            </div>
                            <div class="item" id="status-0">
                                <input type="checkbox" class="check-box-status" data-id="0" id="checkbok-status-0">
                                <label for="checkbok-status-0" class="d-flex label-type label-status">
                                    <img src="/images/light/ic_filter_checkbox_active.svg" width="18" height="18" alt="Đã chọn" class="type-active">
                                    <img src="/images/light/ic_filter_checkbox_inactive.svg" width="18" height="18" alt="Chưa chọn" class="type-inactive ">
                                    <span class="ml-4 type">Chưa hoàn thành</span>
                                </label>
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
                                <img src="/images/light/ic_filter_dropdown_inactive.svg" alt="Xuống" width="14" height="12" class="mt-2px">
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
                <li class="picked-item mr-3 mb-2 " >
                    <div class="d-flex justify-content-center align-items-center no-x" >
                        <span>{{$type->name}}</span>
                    </div>
                </li>
                <li class="picked-item mr-3 mb-2 d-none" id="status-picked-1">
                    <div class="d-flex justify-content-between align-items-center " >
                        <span class="mr-3">Hoàn thành</span>
                        <button class=" btn d-flex btn-delete-status" data-btn="1">
                            <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                        </button>
                    </div>
                </li>
                <li class="picked-item mr-3 mb-2 d-none" id="status-picked-0">
                    <div class="d-flex justify-content-between align-items-center " >
                        <span class="mr-3">Chưa hoàn thành</span>
                        <button class=" btn d-flex btn-delete-status" data-btn="0">
                            <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                        </button>
                    </div>
                </li>
                <li class="picked-item mr-3 mb-2 d-none" id="chap-1">
                    <div class="d-flex justify-content-between align-items-center " >
                        <span class="mr-3">Dưới 100 chương</span>
                        <button class=" btn d-flex btn-delete-chap" data-btn="1">
                            <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                        </button>
                    </div>
                </li>
                <li class="picked-item mr-3 mb-2 d-none" id="chap-2">
                    <div class="d-flex justify-content-between align-items-center " >
                        <span class="mr-3">100-500 chương</span>
                        <button class=" btn d-flex btn-delete-chap" data-btn="2">
                            <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                        </button>
                    </div>
                </li>
                <li class="picked-item mr-3 mb-2 d-none" id="chap-3">
                    <div class="d-flex justify-content-between align-items-center " >
                        <span class="mr-3">500-1000 chương</span>
                        <button class=" btn d-flex btn-delete-chap" data-btn="3">
                            <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                        </button>
                    </div>
                </li>
                <li class="picked-item mr-3 mb-2 d-none" id="chap-4">
                    <div class="d-flex justify-content-between align-items-center " >
                        <span class="mr-3">Trên 1000 chương</span>
                        <button class=" btn d-flex btn-delete-chap" data-btn="4">
                            <img src="/images/light/ic_filter_remove.svg" height="18" width="18"  alt="Xóa" class="mr-auto">
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="content mt-4">
        <div class="row">
            <div class="col-lg-10">
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
                                    <div class="star align-items-center d-flex">
                                        <img src="/images/light/ic_chapter_gray.svg" alt="Chương" width="16" height="16" class="mt-2px">
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
                    <div class="col-12 d-flex pagination ">
                        @include('pagination', ['paginator' => $datas->appends(request()->input())])
                    </div>
                    @else
                    <div class="col-12 text-noti-none text-danger h5">
                        Không có truyện nào phù hợp
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-2">
                @include('layouts.ads.banner_2')
            </div>
        </div>
    </div>
    <div class="pb-4">
        @include('layouts.ads.banner_1')
    </div>
</div>

<script>
    $( document ).ready(function() {
        var type = <?=json_encode($type->name)?>;
        $('.dropdown-item-type').each(function() {
            if($(this).attr("data-type")==type) {
                $(this).addClass('active')
            }
        })
        var status = <?=json_encode($status)?>;
        var chapter = <?=json_encode($chapter)?>;
        var url = "/the-loai/" + <?=json_encode($type->slug)?>;
        $('#status-picked-'+status).removeClass('d-none');
        if (chapter>=0) {
            $('#chap-'+chapter).removeClass('d-none');
        }

        $('#status-' + status + ' .label-type').addClass('text-blue');
        $('#status-' + status + ' .type-inactive').addClass('d-none');

        $('.check-box-status').click(function(){
            $( ".check-box-status" ).off( "click");
            $('.list-status-pick .label-status').removeClass('text-blue');
            $('.list-status-pick .label-status .type-inactive').removeClass('d-none');
            $('#status-' + $(this).attr("data-id") + ' .label-type').toggleClass('text-blue');
            $('#status-' + $(this).attr("data-id") + ' .type-inactive').toggleClass('d-none');
            if(status !=  $(this).attr("data-id")){
                status =  $(this).attr("data-id");
                url = url + "?status=" + status
                if(chapter > 0){
                    url = url + "&chapter=" + chapter;
                }
            }else if (chapter > 0) {
                url = url + "?chapter=" + chapter;
            }
            window.location.href = url;
        })

        $('#chapter-' + chapter + ' .label-type').toggleClass('text-blue');
        $('#chapter-' + chapter + ' .type-inactive').toggleClass('d-none');
        $('.check-box-chapter').click(function(){
            $( ".check-box-chapter" ).off( "click");
            $('.list-number-chap-pick .label-number-chap').removeClass('text-blue');
            $('.list-number-chap-pick .label-number-chap .type-inactive').removeClass('d-none');
            $('#chapter-' + $(this).attr("data-id") + ' .label-type').toggleClass('text-blue');
            $('#chapter-' + $(this).attr("data-id") + ' .type-inactive').toggleClass('d-none');
            if(chapter !=  $(this).attr("data-id")){
                chapter = $(this).attr("data-id");
                if(status > -1){
                    url = url + "?status=" + status
                    url = url + "&chapter=" + chapter;
                }else{
                    url = url + "?chapter=" + chapter;
                }
            } else if (status > -1) {
                url = url + "?status=" + status
            }
            window.location.href = url;
        })


        $('.btn-delete-status').click(function() {
            $( ".btn-delete-chap" ).off( "click");
            if(chapter > 0) {
                url = url + "?chapter=" + chapter;
            }
            window.location.href = url;
        })

        $('.btn-delete-chap').click(function() {
            $( ".btn-delete-chap" ).off( "click");
            if(status > -1){
                url = url + "?status=" + status;
            }
            window.location.href = url;
        })
    });

</script>
@endsection
