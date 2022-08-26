@extends('layouts.app_'.$dark_light)
@section('title',$data->name)
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.js" integrity="sha512-vDRRSInpSrdiN5LfDsexCr56x9mAO3WrKn8ZpIM77alA24mAH3DYkGVSIq0mT5coyfgOlTbFyBSUG7tjqdNkNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="Ed5Z1UUs"></script>
<div class="detail-novel-template pt-36">
    <div class="container">
        <div class="detail-novel">
            <div class="title">
                <a href="/">
                    <img src="/images/light/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-off img-home">
                    <img src="/images/dark/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-on img-home">
                </a>
                <span class="white">/</span>
                <a href="/chi-tiet/{{$data->slug}}" class="text-warning">{{html_entity_decode($data->name)}}</a>
            </div>
            <div class="pt-4">
                @include('layouts.ads.banner_1')
            </div>
            <div class="content mt-4">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="top row">
                            <div class="col-lg-4 d-flex pr-36">
                                <div class="book-thum w-100 ">
                                    <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="img-2-3 w-100">
                                </div>
                            </div>
                            <div class="col-lg-8 font-14 mt-3 mt-lg-0 ">
                                    <h3 class="name">{{html_entity_decode($data->name)}}</h3>
                                    <div class="d-flex author-status mt-3 mt-lg-4 flex-lg-row flex-column">
                                        <div class="d-flex mb-2 mb-lg-0 align-items-center">
                                            <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                                            <span class="ml-1 text-000-4 text-no-wrap">Tác giả: </span>
                                            <a href="/tac-gia/{{$data->author->slug}}" class=" ml-1 a-blue break-word">{{$data->author->name}}</a>
                                        </div>
                                        <div class="d-flex mb-2 mb-lg-0 align-items-center">
                                            <img src="/images/light/ic_chapter_gray.svg" alt="Chương" width="16" height="16" class=" mt-2px ">
                                            <span class="text-blue ml-1 f-550 text-no-wrap">
                                                {{$data->number_last}}
                                           </span>
                                            <!-- <span class="ml-1 text-000-4 text-no-wrap">Số chương:
                                            </span>  -->
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="/images/light/ic_detail_status.svg" width="16" height="16" alt="Trạng thái" class=" mt-4px">
                                            <span class="ml-1 text-000-4 text-no-wrap">Trạng thái: </span>
                                            @if($data->full == 1)
                                            <span class="ml-1 text-blue f-550 text-no-wrap">Đã hoàn thành</span>
                                            @else
                                            <span class="ml-1 text-blue f-550 text-no-wrap">Chưa hoàn thành</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex mt-2 mt-lg-4">
                                        <div class="d-flex">
                                            <img src="/images/light/ic_detail_category.svg" alt="Thể loại" width="16" height="16" class=" mt-2px mt-4px">
                                            <span class=" ml-1 text-000-4 text-no-wrap">Thể loại:</span>
                                            <div class="d-flex flex-wrap">
                                                @if(count($types) > 0)
                                                    @foreach($types as $type)
                                                        <a href="/the-loai/{{$type->slug}}" class="ml-2 a-blue">{{$type->name}}</a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <hr>
                                <div class="rate-box d-flex flex-column justify-content-center align-items-center">
                                <div id="rateYo"  rate_item-save="{{$data->rate}}" class="p-0"></div>
                                    <div class="detail-rate h5 text-000-4 mt-2 ">
                                        Đánh giá:
                                        <span class="text-warning rate">{{number_format($data->rate/2,1)}}</span>
                                        <span>/ 5 từ <span class="vote">{{$data->number_of_votes}}</span> lượt </span>
                                    </div>
                                </div>
                                <div class="wrap-des font-14 mt-3">
                                    <div class="des all mt-3 text-000-4" >
                                        {!!$data->content!!}
                                    </div>
                                </div>
                                <a class="direct-des d-flex justify-content-end" >
                                    <div class="see-more text-000-4 mt-3 d-none">
                                        <div class="btn open-des">Xem thêm</div>
                                        <div class="btn close-des d-none">Thu gọn</div>
                                    </div>
                                </a>
                                <div class="d-flex mt-4">
                                    <a href="/{{$data->slug}}/{{$chapter_first->slug}}" class="btn btn-read m-auto">ĐỌC TRUYỆN</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-chap mt-4">
                            <div class="title">Danh sách chương</div>
                            <div class="newest-chap px-xl-5 mt-3">
                                <div class="d-flex text-chap">
                                    <p class="text-no-wrap mb-0 my-newest">Chương mới nhất:</p>
                                    <div class="d-flex flex-column flex-lg-row w-100">
                                        <a href="/{{$data->slug}}/{{$data->url_last_chapter}}" class="ml-2 text-blue newest-chap-link word-break">{{$data->name_chap_last}}</a>
                                        <div class="time-newest d-flex ml-lg-auto pl-0 pl-lg-3 align-items-center">
                                            <img src="/images/light/ic_detail_time_black.svg" width="16" height="16" alt="Ngày" class="dark-off">
                                            <img src="/images/dark/ic_detail_time_white.svg" width="16" height="16" alt="Ngày" class="dark-on">
                                            <span class="ml-1 text-1-line white " style="min-width:95px">{{date('Y-m-d', strtotime($chapter_last_date->created_at))}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row px-xl-5 ">
                                <ul class="col box-chap">
                                    @foreach($chapters as $chapter)
                                    <li class="mb-2 ">
                                        <a href="/{{$data->slug}}/{{$chapter->slug}}" class="text-1-line text-000-4 text-chap">{{html_entity_decode($chapter->name)}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="col-12 d-flex">
                                    @include('pagination', ['paginator' => $chapters])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        @include('layouts.ads.banner_2')
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-4">
            @include('layouts.ads.banner_1')
        </div>
    </div>
</div>
@if($data_author !=null)
<div class="novel-full mb-5 py-4">
    <div class="container">
        <div class="title d-flex justify-content-between">
            <h3 class="mb-0 d-flex justify-content-center align-items-center">Truyện cùng tác giả</h3>
            <a href="/tac-gia/{{$data->author->slug}}" class="btn btn-all">Xem tất cả</a>
        </div>
        <div class="list-full mt-4">
            @foreach($data_author as $author)
            <a class="card-novel item-full" href="/chi-tiet/{{$author->slug}}">
                <img src="/image-avatars/{{$author->image}}" alt="{{$author->image}}" class="w-100 br-6 img-3-4">
                <div class="content">
                    <h5 class="name name-same-author mt-2 mb-1 text-2-line">{{$author->name}}</h5>
                    <div class="align-items-center d-flex">
                        <img src="/images/light/ic_chapter_gray.svg" width="16" height="16" alt="Chương" class="mr-1 ">
                        <span class="newest-chap text-000-4 text-1-line ">{{$author->number_last}}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="container comment-box">
    <div class="title">
        <span>Bình luận</span>
    </div>
    <div class="fb-comments" data-href="http://127.0.0.1/chi-tiet/{{$data->slug}}"  data-numposts="10" data-width="100%" data-colorscheme="light" ></div>
</div>
<script>
    $( document ).ready(function() {
        var loop = <?=json_encode($data_author)?>;
        if(loop==0) {
            $('.novel-full').css('display', 'none');
        }
        if($('.detail-novel .content .top .des').height()>125){
            $('.see-more').removeClass('d-none')
        }

        $('.see-more').click(function(){
            $('.wrap-des').toggleClass('all')
            $('.open-des,.close-des').toggleClass('d-none')
        })
    })

    $(function () {
        let list_rate = [];
        let id = <?=json_encode($data->id)?>;
        let check = 0;
        let rate_before = 0;
        let rate;
        let rate_item;
        let rateSave = ($("#rateYo").attr("rate_item-save"))/2
        $("#rateYo").rateYo({
            starWidth: "26px",
            spacing: "10px",
            numStars:5,
            fullStar: true,
            rating: rateSave,
            maxValue:5,
            precision: 5
        })

        $("#rateYo").rateYo().on("rateyo.set", function (e, data) {
            if(localStorage.getItem("Rate")!=null) {
                list_rate = JSON.parse(localStorage.getItem("Rate"));
                for(let i = 0; i<list_rate.length; i++) {
                    if(list_rate[i].id==id) {
                        rate_before = list_rate[i].rate
                        list_rate.splice(i,1)
                    }
                }
            }
            rate = data.rating
            rate_item = {id:id, rate:rate}
            list_rate.push(rate_item)
            let JsonRate = JSON.stringify(list_rate)
            localStorage.setItem('Rate',JsonRate)
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                method:"POST",
                data: {
                    "id": id,
                    "rate" : rate,
                    "rate_before": rate_before
                },
                type:'POST',
                url:'/ajax/rate',
                success:function(res) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: "Cảm ơn bạn đã đánh giá truyện!"
                    });
                    $('.detail-rate .rate').html(res.rate);
                    $('.detail-rate .vote').html(res.vote);
                }

            })
        })
    })
</script>

@endsection
