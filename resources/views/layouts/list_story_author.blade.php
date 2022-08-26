@foreach($datas as $data)
    <div class="col-lg-6 mb-lg-4 mb-3">
        <a class="item-author" href="/chi-tiet/{{$data->slug}}">
            <img src="/image-avatars/{{$data->image}}" alt="{{$data->image}}" class="br-6 w-100 img-2-3">
            <div class="item-content pr-4 over-hidden">
                <h5 class="name">
                    {{$data->name}}
                </h5>
                <div class="d-flex my-flex mt-3">
                    <div class="author align-items-center d-flex">
                        <img src="/images/light/ic_author_gray.svg" alt="Tác giả" width="18" height="18" class="mt-2px">
                        <span class="ml-1 text-000-4 text-1-line">{{$data->author->name}}</span>
                    </div>
                    <div class="star align-items-center d-flex ml-star">
                        <img src="/images/light/ic_rating_gray.svg" alt="Đánh giá" width="18" height="18" class="mt-2px">
                        <span class="ml-1 text-000-4">{{number_format($data->rate/2,1)}}</span>
                    </div>
                </div>
                <div class="des text-000-4 mt-3 text-3-line">
                    {!!$data->content!!}
                </div>
            </div>
        </a>
    </div>
@endforeach
<script>
    var length_author = <?=json_encode($datas->count())?>;
</script>