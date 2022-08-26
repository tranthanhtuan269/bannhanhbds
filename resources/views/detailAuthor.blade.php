@extends('layouts.app_'.$dark_light)
@section('title','Tác giả ' .' - '.$author->name)
@section('content')
<div class="detail-author-template  pt-36 " id="min-height">
    <div class="container">
        <div class="detail-author">
            <div class="title title-author d-flex align-items-center">
                <div class="d-flex">
                    <a href="/">
                        <img src="/images/light/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-off img-home">
                        <img src="/images/dark/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-on img-home">
                    </a>
                    <span class="white ml-1">/</span>
                    <a class="text-warning ml-1" href="/tac-gia/{{$author->slug}}">{{$author->name}}</a>
                </div>
                <div class="d-flex right-side ml-auto">
                    <div class="btn control-detail mr-2 d-flex">
                        <span class="mr-2 text-blue">Sắp xếp</span>
                        <img src="/images/light/ic_sort_blue.svg" alt="Cài đặt" width="20" height="22" >
                        <div class="box-control p-4 d-none">
                            <button class="btn btn-close-control">
                                <img src="/images/light/ic_detail_tool_close.svg" alt="Đóng">
                            </button>
                            <h3 class="title text-left text-primary" >
                                Sắp xếp
                            </h3>
                            <table class="w-100">
                                <tbody>
                                    <tr class="mt-4">
                                        <td>
                                            <div classed="d-flex justify-content-center align-items-center ">
                                                <img src="/images/light/ic_sort_white_name.svg" alt="Tên" class="dark-off">
                                                <img src="/images/dark/ic_sort_white_name.svg" alt="Tên" class="dark-on">
                                                <span class="ml-3">Tên truyện</span>
                                            </div>
                                        </td>
                                        <td>
                                            <select id="nameStory" class="control-select w-100">
                                                <option value="1">A-Z</option>
                                                <option value="2">Z-A</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="mt-4">
                                        <td>
                                            <div classed="d-flex justify-content-center align-items-center">
                                                <img src="/images/light/ic_sort_white_date.svg" alt="Ngày" class="dark-off">
                                                <img src="/images/dark/ic_sort_white_date.svg" alt="Ngày" class="dark-on">
                                                <span class="ml-3">Ngày cập nhật</span>
                                            </div>
                                        </td>
                                        <td>
                                            <select id="updateDay" class="control-select w-100">
                                                <option value="1">Mới nhất</option>
                                                <option value="2">Lâu nhất</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="mt-4">
                                        <td>
                                            <div classed="d-flex justify-content-center align-items-center">
                                                <img src="/images/light/ic_sort_white_view.svg" alt="Lượt đọc" class="dark-off">
                                                <img src="/images/dark/ic_sort_white_view.svg" alt="Lượt đọc" class="dark-on">
                                                <span class="ml-3">Số lượt đọc</span>
                                            </div>
                                        </td>
                                        <td>
                                            <select id="numberOfReads" class="control-select w-100">
                                                <option value="1">Nhiều nhất</option>
                                                <option value="2">Ít nhất</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="mt-4">
                                        <td>
                                            <div classed="d-flex justify-content-center align-items-center">
                                                <img src="/images/light/ic_sort_white_chapter.svg" alt="Số chương" class="dark-off">
                                                <img src="/images/dark/ic_sort_white_chapter.svg" alt="Số chương" class="dark-on">
                                                <span class="ml-3">Số chương</span>
                                            </div>
                                        </td>
                                        <td>
                                            <select id="chapterNumber" class="control-select w-100">
                                                <option value="1">Dài nhất</option>
                                                <option value="2">Ngắn nhất</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class=" mt-4 d-flex w-100">
                                <button class="btn btn-submit m-auto">XÁC NHẬN</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="d-flex label-full filter-author-status">
                            <img src="/images/light/btn_sort_toggle_off.svg" alt="Chưa hoàn thành" width="60" height="36" class="not-full d-none">
                            <img src="/images/light/btn_sort_toggle_on.svg" alt="Hoàn thành" width="60" height="36" class="full">
                            <span class="text-primary full">Đã hoàn thành</span>
                            <span class="text-primary d-none not-full">Chưa hoàn thành</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-1">
            <div class=" text-noti-none d-none text-danger mt-5 h5">
                Không có truyện nào phù hợp
            </div>
            <div class="content mt-4">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row list_story_author">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        @include('layouts.ads.banner_2')
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4">
            @include('layouts.ads.banner_1')
        </div>
    </div>
</div>
<script>
    var check = 0;
    var id_author = <?=json_encode($author->id)?>;
    let nameStory = $('#nameStory').val();
    let updateDay = $('#updateDay').val();
    let numberOfReads = $('#numberOfReads').val();
    let chapterNumber = $('#chapterNumber').val();
    var list_sort = [];
    let status = localStorage.getItem('Sort');
    if (status && status.length) {
        const myArray = JSON.parse(status);
        var lastItem = myArray.pop();
        check = lastItem.check;
        nameStory = lastItem.name;
        updateDay = lastItem.day;
        numberOfReads = lastItem.read;
        chapterNumber = lastItem.chapter;
        $('#nameStory').val(nameStory);
        $('#updateDay').val(updateDay);
        $('#numberOfReads').val(numberOfReads);
        $('#chapterNumber').val(chapterNumber);
        if(check % 2 == 1){
            $('.filter-author-status .not-full').removeClass('d-none');
            $('.filter-author-status .full').addClass('d-none');
        }
        if (check === 0) {
            listProjectSearch(id_author, check, nameStory, updateDay, numberOfReads, chapterNumber);
        } else {
            listProjectSearch(id_author, check, nameStory, updateDay, numberOfReads, chapterNumber);
        }
    } else {
        listProjectSearch(id_author, check, nameStory, updateDay, numberOfReads, chapterNumber);
    }
    function listProjectSearch(id_author, check, nameStory, updateDay, numberOfReads, chapterNumber){
        $.ajax({
            data: {
                check : check,
                id_author : id_author,
                nameStory : $('#nameStory').val(),
                updateDay : $('#updateDay').val(),
                numberOfReads : $('#numberOfReads').val(),
                chapterNumber : $('#chapterNumber').val(),
                "_token": "{{ csrf_token() }}"
            },
            type:'POST',
            url:'/ajax/list-story-author',
            beforeSend: function() {
                $(".ajax_waiting").addClass("loading");
            },
            complete: function() {
                $(".ajax_waiting").removeClass("loading");
            },
            success:function(res) {
                $('.btn-close-control').click()
                $('.list_story_author').html(res)
                if(length_author==0) {
                    $('.text-noti-none').removeClass('d-none')
                }else {
                    $('.text-noti-none').addClass('d-none')
                }
                $('#nameStory').val(nameStory);
                $('#updateDay').val(updateDay);
                $('#numberOfReads').val(numberOfReads);
                $('#chapterNumber').val(chapterNumber);
            }
        });
    }
    // listProjectSearch();
    $(document).ready(function(){
        $('.btn-submit').click(function(){
            nameStory = $('#nameStory').val();
            updateDay = $('#updateDay').val();
            numberOfReads = $('#numberOfReads').val();
            chapterNumber = $('#chapterNumber').val();
            sort_item = {id: id_author, check: check, name: nameStory, day: updateDay, read: numberOfReads, chapter: chapterNumber};
            list_sort.push(sort_item);
            localStorage.setItem("Sort", JSON.stringify(list_sort));
            listProjectSearch(id_author, check, nameStory, updateDay, numberOfReads, chapterNumber);
        })
        $('.control-detail').click(function(){
            $('.box-control').toggleClass('d-none');
            $('#nameStory').val(nameStory);
            $('#updateDay').val(updateDay);
            $('#numberOfReads').val(numberOfReads);
            $('#chapterNumber').val(chapterNumber);
        })

        $('.box-control').click(function(e){
            e.stopPropagation();
        })

        $('.btn-close-control').click(function(e){
            e.stopPropagation();
            $('.box-control').addClass('d-none');
            $('#chapterNumber,#numberOfReads,#updateDay,#nameStory').val('1');
        })

        $('.label-full').click(function(){
            $(this).toggleClass('active')
            $('span.full').toggleClass('d-none')
            $('span.not-full').toggleClass('d-none')
            $('img.full').toggleClass('d-none')
            $('img.not-full').toggleClass('d-none')
            check ++;
            sort_item = {id: id_author, check: check, name: nameStory, day: updateDay, read: numberOfReads, chapter: chapterNumber};
            list_sort.push(sort_item);
            localStorage.setItem("Sort", JSON.stringify(list_sort));
            listProjectSearch(id_author, check, nameStory, updateDay, numberOfReads, chapterNumber);
        })
    })
</script>

@endsection
