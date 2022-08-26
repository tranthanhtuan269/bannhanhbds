<select class="btn btn-select-chap btn-chap w-100">
    @foreach($list_chapter as $val)
    <option value="{{$val->slug}}"><a href="#" >Chương {{\App\Helpers\Helper::convertName($val->slug)}}</a></option>
    @endforeach
</select>