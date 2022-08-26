@extends('layouts.app')
@section('title','BĐS nổi bật, truyện hay')
@section('content')
<div class="detail-rank pt-36" id="min-height">
    <div class="find-novel container">
        <div class="title ">
            <a href="/">
                <img src="/images/light/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-off img-home">
                <img src="/images/dark/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-on img-home">
            </a>
            <span class="white">/</span>
            <a class="text-warning" href="/truyen-hot"> BĐS nổi bật</a>
        </div>
        <div class="title-tab mt-3">
            <ul class="nav nav-tabs tab-rank w-100">
                <li class="nav-item ">
                    <a class="nav-link active text-center" data-toggle="tab" href="#all">Tất cả</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-center nav-week" data-toggle="tab" href="#week">Theo Tuần</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-center nav-month" data-toggle="tab" href="#month">Theo Tháng</a>
                </li>
            </ul>
        </div>
        <div class="tab-content mb-5">
            <div class="tab-pane active" id="all">
                <div class="tab-content tab-content-ranking mt-4 ">
                    <ul class="list-hot-group-left">
                        @foreach($datas as $key => $data)
                        @if($key<=4)
                            @if($key==0) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-1"></div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line ">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @if($key==1) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-2"></div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @if($key==2) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-3"></div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @if($key>2) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank ">{{$key + 1}}</div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                        <ul class="list-hot-group-left">
                            @foreach ($datas as $key => $data)
                            @if($key>4) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank ">{{$key + 1}}</div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @endforeach
                        </ul>    
                </div>       
            </div>
            <div class="tab-pane" id="week">
                <div class="tab-content tab-content-ranking mt-4 ">
                    <ul class="list-hot-group-left">
                        @foreach($datas_week as $key => $data)
                        @if($key<=4)
                            @if($key==0) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-1"></div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line ">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @if($key==1) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-2"></div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @if($key==2) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-3"></div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @if($key>2) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank ">{{$key + 1}}</div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                        <ul class="list-hot-group-left">
                            @foreach ($datas_week as $key => $data)
                            @if($key>4) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank ">{{$key + 1}}</div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @endforeach
                        </ul>    
                </div>    
            </div>
            <div class="tab-pane" id="month">
                <div class="tab-content tab-content-ranking mt-4 ">
                    <ul class="list-hot-group-left">
                        @foreach($datas_month as $key => $data)
                        @if($key<=4)
                            @if($key==0) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-1"></div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line ">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @if($key==1) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-2"></div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @if($key==2) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank rank-123 rank-3"></div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @if($key>2) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank ">{{$key + 1}}</div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                        <ul class="list-hot-group-left">
                            @foreach ($datas_month as $key => $data)
                            @if($key>4) 
                            <li class="mb-3 mb-lg-4">
                                <a class="item-rank d-flex" href="/chi-tiet/{{$data->slug}}">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="rank ">{{$key + 1}}</div>
                                    </div>
                                    <div class="info over-hidden">
                                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-3-4">
                                        <div class="description pr-3">
                                            <h5 class="name text-2-line">
                                                {{$data->name}}
                                            </h5>
                                            <div class="d-flex my-flex">
                                                <div class="author align-items-center d-flex">
                                                    <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                                                    <span class="ml-1 text-000-4">{{$data->author->name}}</span>
                                                </div>
                                                <div class="star align-items-center  d-flex ml-star">
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
                            </li>
                            @endif
                            @endforeach
                        </ul>    
                </div>      
            </div>
        </div>
    </div>
</div>

<script>
    $('.dropdown-menu-category .hot-item').addClass('active')
</script>

@endsection
