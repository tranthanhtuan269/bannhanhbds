<section class="home novel-full mb-5 py-4">
    <div class="container">
        <div class="title d-flex justify-content-between">
            <h3 class="mb-0 justify-content-center align-items-center d-flex">BĐS đã bán</h3>
            <a href="/truyen-da-hoan-thanh" class="btn btn-all">Xem tất cả</a>
        </div>
        <div class="list-full mt-4">
            @foreach($story_full as $data)
            <a class="card-novel item-full" href="/chi-tiet/{{$data->slug}}" title="{{$data->name}}">
                <img data-original="/image-avatars/{{$data->image}}" src="/images/ic_top_menu.svg" alt="{{$data->image}}" class="w-100 br-6 img-3-4">
                <div class="content">
                    <h5 class="name mb-1 mt-2 text-2-line">{{$data->name}}</h5>
                    <div class="d-flex align-items-center ">
                        <img src="/images/light/ic_chapter_gray.svg" width="16" height="16" alt="Chương" class="mr-1">
                        <span class="newest-chap text-000-4 text-1-line mb-0">{{$data->number_last}}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>