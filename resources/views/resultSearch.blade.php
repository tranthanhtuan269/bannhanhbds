@extends('layouts.app_'.$dark_light)
@section('title','Tìm truyện với từ khóa: ' .$search)
@section('content')
<div class="detail-author-template" id="min-height">
    <div class="container">
        <div class="py-4">
            @include('layouts.ads.banner_1')
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-8 offset-lg-3 offset-sm-2">
                @include('layouts.box-search')
            </div>
        </div>
        <div class="detail-author result-search mt-36 pb-4">
            <div class="title">
                <a href="/">
                    <img src="/images/light/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-off img-home">
                    <img src="/images/dark/ic_home.svg" width="20" height="21" alt="Tiêu đề" class="mb-2 dark-on img-home">
                </a>
                <span class="white">/</span>
                <a href="/ket-qua?tukhoa={{$search}}" class="text-warning">Tìm truyện với từ khóa: {{$search}}</a>
            </div>
            <hr class="mt-1">
            <div class="content mt-4">
                @if($message=='')
                <div class="list-search">
                    @foreach($datas as $data)
                    <a class="card-novel item-full" href="/chi-tiet/{{$data->slug}}">
                        <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="w-100 br-6 img-3-4">
                        <div class="content">
                            <h5 class="name mt-2 mb-1 text-2-line">{{$data->name}}</h5>
                            <div class="author align-items-center d-flex">
                                <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                                <span class="ml-1 text-000-4 text-1-line">{{$data->author->name}}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="col h5 text-danger text-center">
                    {{$message}}
                </div>
                @endif
                <div class="col-12 d-flex">
                    @include('pagination', ['paginator' => $datas->appends(request()->input())])
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $( document ).ready(function() {
        let message = <?=json_encode($message)?>;
        $("#pac-input").keyup(function(e){
            var code = e.key;
            if(code==="Enter") e.preventDefault()
            let search_input = $('#pac-input').val()
            search_input = search_input.trim()
            if(search_input.length >= 1) {
                if(code==="Enter"){
                    window.location.href = "/ket-qua?" + "tukhoa=" + search_input
                }
            }
        })

        $('.icon-search').click(function() {
            let search_input = $('#pac-input').val()
            search_input = search_input.trim()
            if(search_input.length >= 1 ) {
                window.location.href = "/ket-qua?" + "tukhoa=" + search_input
            }
        })

    })
    let search = <?=json_encode($search)?>;
    $("#pac-input").val(search);
</script>

@endsection
