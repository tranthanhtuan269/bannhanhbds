<section class="box-new-novel my-5" >
    <div class="title d-flex justify-content-between">
        <h3 class="mb-0 d-flex justify-center align-items-center">BĐS mới đăng bán</h3>
        <a href="/truyen-moi-cap-nhat" class="btn btn-all">Xem tất cả</a>
    </div>
    <div class="content mt-4">
        <div class="row">
            <div class="col-lg-4 ">
                @if(count($data_updates) > 0)
                <a class="zoom-novel" href="/chi-tiet/{{$data_updates[0]->slug}}">
                    <div class="top py-4 d-flex">
                        <img data-original="/image-avatars/{{$data_updates[0]->image}}" src="/images/ic_top_menu.svg" width="40%" height="60%" alt="{{$data_updates[0]->image}}" class=" br-6 img-3-4-lg">
                    </div>
                    <div class="bottom p-3 p-sm-4 ">
                        <h5 class="name text-2-line" >
                            {{$data_updates[0]->name}}
                        </h5>
                        <div class="d-flex justify-content-between mt-3 mt-sm-4 text-000-4">
                            <div class="author d-flex">
                                <img src="/images/light/ic_author_gray.svg" width="18" height="18" alt="Tác giả" class="mr-1 mt-2px">
                                <span class="text-1-line">{{$data_updates[0]->author->name}}</span> 
                            </div>
                            <div class="time-release align-items-center d-flex">
                                <img src="/images/light/ic_time_gray.svg" width="16" height="16" alt="Ra mắt" class="mr-1 mt-2px mt-2-chap">
                                <span class="text-1-line">{{\App\Helpers\Helper::convertTime($data_updates[0]->chapter_update_time)}}</span> 
                            </div>
                        </div>
                        <div class="d-flex newest-chapter align-items-center mt-2 mt-sm-3 text-000-4">
                            <img src="/images/light/ic_chapter_gray.svg" width="16" height="16" alt="Chương" class="mr-1">
                            @if($data_updates[0]->full == 1) 
                                <span class="text-1-line">{{$data_updates[0]->name_chap_last}}[Hết]</span>
                            @else
                                <span class="text-1-line">{{$data_updates[0]->name_chap_last}}</span>
                            @endif
                        </div>
                        <div class="des mt-2 mt-sm-3 text-000-4 text-5-line">
                            {!!$data_updates[0]->content!!}
                        </div>
                    </div>
                </a>
                @endif
            </div>
            <div class="col-lg-8">
                <div class="list-right mt-4 mt-lg-0">
                    @foreach($data_updates as $key=>$data)
                    @if($key > 0)
                     <a class="card-novel" href="/chi-tiet/{{$data->slug}}" title="<?php echo ($data->full === 1) ? $data->name_chap_last .' [Hết]' : $data->name_chap_last ?>">
                        <img data-original="/image-avatars/{{$data->image}}" src="/images/ic_top_menu.svg" alt="{{$data->image}}" class="w-100 br-6 img-3-4">
                        <div class="content">
                            <h5 class="name mb-1 mt-2 text-2-line">{{$data->name}}</h5>
                            <div class="align-items-center d-flex">
                                <img src="/images/light/ic_chapter_gray.svg" width="16" height="16" alt="Chương" class="mr-1 ">
                                @if($data->full == 1)
                                <span class="newest-chap text-000-4 text-1-line mb-0">{{$data->name_chap_last}} [Hết]</span>
                                @else
                                <span class="newest-chap text-000-4 text-1-line mb-0">{{$data->name_chap_last}}</span>
                                @endif
                            </div>
                        </div>
                    </a>
                    @endif
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</section>