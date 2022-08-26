<script src="{{ url('/') }}/templateEditor/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/js/jquery.Jcrop.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/css/jquery.Jcrop.min.css" type="text/css" />
<script src="https://gospeedcheck.com/backend/js/moment.min.js"></script>
<script src="https://gospeedcheck.com/backend/js/bootstrap-datetimepicker.min.js"></script>


<div class="card-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><h4><strong>CONTENT</strong></h4></li>
      </ol>
    </nav>
    <div class="form-group clearfix">
        {!! Form::label('title', 'Name', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('title', old('title', isset($data->name) ? $data->name : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="name-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('rate', 'Rate', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('rate', old('rate', isset($data->rate) ? $data->rate : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('number_of_votes', 'Số người vote', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('number_of_votes', old('number_of_votes', isset($data->number_of_votes) ? $data->number_of_votes : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('view', 'View', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('view', old('view', isset($data->view) ? $data->view : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('view_week', 'View Week', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('view_week', old('view_week', isset($data->view_week) ? $data->view_week : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('view_month', 'View Month', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('view_month', old('view_month', isset($data->view_month) ? $data->view_month : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('full', 'Full (1 : full; 0 : no full)', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('full', old('full', isset($data->full) ? $data->full : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('url_last_chapter', 'url chapter cuối cùng', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('url_last_chapter', old('url_last_chapter', isset($data->url_last_chapter) ? $data->url_last_chapter : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('name_chap_last', 'Tên chapter cuối cùng', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('name_chap_last', old('name_chap_last', isset($data->name_chap_last) ? $data->name_chap_last : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('total_chapter', 'Tổng chapter', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('total_chapter', old('total_chapter', isset($data->total_chapter) ? $data->total_chapter : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('content', 'Content', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::textarea('content', old('content', isset($data->content) ? $data->content : ''), ['class' => 'form-control']) !!}
            <p class="alert-errors" id="detail-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    @if(\Request::is('admincp/storys/create'))
    <div class="form-group clearfix">
        {!! Form::label('slug', 'Slug truyện', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            {!! Form::text('slug', old('slug', isset($data->slug) ? $data->slug : ''), ['class' => 'form-control']) !!}
           <p class="alert-errors" id="slug-error" role="alert" style="display: none;"></p>
        </div>
    </div>
    <div class="form-group clearfix imageUploadFormGroup">
        {!! Form::label('image', 'Image', ['class' => 'col-md-1 control-label font-weight-600 font-weight-600']) !!}
        <div class="col-md-12 product-image">
            @if(isset($data) && !empty($data->image))
                <input type="hidden" id="image" name="image" value="{{ $data->image }}">
                <img src="{{ url('/') }}/images/{{ $data->image }}" id="product-image" class="img" style="background-color: #fff; border: 2px solid gray; border-radius: 5px; width: 250px; height: 181px;">
            @else
                <input type="hidden" id="image" name="image" value="">
                <img src="{{ url('/') }}/images/default.jpg" id="product-image" class="img" style="background-color: #fff; border: 2px solid gray; border-radius: 5px; width: 250px; height: 181px;">
            @endif
            <small id="fileHelp" class="form-text text-muted"><b>Note: </b>Photos should be size from 160 x 160 to 3,000 x 3,000 pixels.</small> 
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('id_author', 'Tác giả', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            <select class="form-control" id="id_author">
                @foreach($authors as $author)
                <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group clearfix">
        {!! Form::label('type_story', 'Thể loại', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            <select id="type_story" multiple="multiple">
                @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @else
    <div class="form-group clearfix">
        {!! Form::label('id_author', 'Tác giả', ['class' => 'col-md-1 control-label font-weight-600']) !!}
        <div class="col-md-10">
            <select class="form-control" id="id_author">
                @foreach($authors as $author)
                @if($author->id == $data->author_id)
                <option value="{{$author->id}}" selected>{{$author->name}}</option>
                @else
                <option value="{{$author->id}}">{{$author->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    @endif
<script>
    $(function(){
  $('#type_story').multiselect();
});

</script>
    <div class="col-md-4">
        <div class="row">
            <label for="type_post" class="col-md-4 control-label font-weight-600">Ngày cập nhật mới nhất:</label>
            <div class='col-md-8 input-group date' id='updated_at'>
                <input type="text" class="form-control" placeholder="DD/MM/YYYY HH:mm" name="updated_at" value="{{ isset($data->chapter_update_time) && $data->chapter_update_time != '' ? \App\Helpers\Helper::convertTime1($data->chapter_update_time) : date('d/m/Y H:i') }}">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <script type="text/javascript">
                $('#updated_at').datetimepicker({
                    format: "DD/MM/YYYY HH:mm"
                });
            </script>
        </div>
    </div>
</div>
<div class="form-group clearfix">
    <div class="col-md-12 text-center">
        <button class="btn btn-primary" id="save-change" data-action="@if(\Request::is('admincp/storys/create'))create @endif">Save</button>
    </div>
</div> 
<div class="loadingModal"><!-- Place at bottom of page --></div>
<style>
.loadingModal {
    display:    none;
    position:   fixed;
    z-index:    99999999999;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading .loadingModal {
    overflow: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .loadingModal {
    display: block;
}
</style>
<script>
    var crop_max_width = 400;
    var crop_max_height = 400;
    var jcrop_api;
    var canvas;
    var context;
    var image;
    var errorConnect = 'Errors network';
    var prefsize;
    CKEDITOR.replace( 'content', {
        'filebrowserBrowseUrl' : '{{ url("/") }}/templateEditor/kcfinder/browse.php?opener=ckeditor&type=files',
        'filebrowserImageBrowseUrl' : '{{ url("/") }}/templateEditor/kcfinder/browse.php?opener=ckeditor&type=images',
        'filebrowserFlashBrowseUrl' : '{{ url("/") }}/templateEditor/kcfinder/browse.php?opener=ckeditor&type=flash',
        'filebrowserUploadUrl' : '{{ url("/") }}/templateEditor/kcfinder/upload.php?opener=ckeditor&type=files',
        'filebrowserImageUploadUrl' : '{{ url("/") }}/templateEditor/kcfinder/upload.php?opener=ckeditor&type=images',
        'filebrowserFlashUploadUrl' : '{{ url("/") }}/templateEditor/kcfinder/upload.php?opener=ckeditor&type=flash',
        'height': '300px',
    } );

    $( "input[name=title]" ).keyup(function() {
        let slug_value = titleToSlug($( "input[name=title]" ).val());
        $( "input[name=slug]" ).val(slug_value)
    });
    $(document).ready(function(){
        $('#save-change').click(function(){
            url = baseURL + '/admincp/storys';
            if ($(this).attr('data-action') === 'create ') {
                method           = "POST";
                var data    = {
                    _method           : method,
                    name : $('input[name=title]').val(),
                    slug : $('input[name=slug]').val(),
                    rate: $('input[name=rate]').val().trim(),
                    number_of_votes: $('input[name=number_of_votes]').val().trim(),
                    view: $('input[name=view]').val().trim(),
                    view_week: $('input[name=view_week]').val().trim(),
                    view_month: $('input[name=view_month]').val().trim(),
                    full: $('input[name=full]').val().trim(),
                    url_last_chapter: $('input[name=url_last_chapter]').val().trim(),
                    name_chap_last: $('input[name=name_chap_last]').val().trim(),
                    total_chapter: $('input[name=total_chapter]').val().trim(),
                    content : CKEDITOR.instances['content'].getData(),
                    id_author: $('#id_author').val(),
                    image: $('input[name=image]').val(),
                    type_story: $('#type_story').val(),
                    updated_at: $('input[name=updated_at]').val().trim(),
                };
            }else{
                url += '/{{ Request::route("story") }}';
                method = "PUT";
                var data    = {
                    _method           : method,
                    name : $('input[name=title]').val(),
                    rate: $('input[name=rate]').val().trim(),
                    number_of_votes: $('input[name=number_of_votes]').val().trim(),
                    view: $('input[name=view]').val().trim(),
                    view_week: $('input[name=view_week]').val().trim(),
                    view_month: $('input[name=view_month]').val().trim(),
                    full: $('input[name=full]').val().trim(),
                    url_last_chapter: $('input[name=url_last_chapter]').val().trim(),
                    name_chap_last: $('input[name=name_chap_last]').val().trim(),
                    total_chapter: $('input[name=total_chapter]').val().trim(),
                    content : CKEDITOR.instances['content'].getData(),
                    id_author: $('#id_author').val(),
                    updated_at: $('input[name=updated_at]').val().trim(),
                };
            }
            data: data,
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'json',
                beforeSend: function() {
                    $('.alert-errors').hide();
                },
                complete: function(data) {
                    if(data.responseJSON.status == 200){
                        $().toastmessage('showSuccessToast', data.responseJSON.Message);
                    }else{
                        if(data.status == 422){
                            $.each(data.responseJSON.errors, function( index, value ) {
                                $('#' + index + '-error').show();
                                $('#' + index + '-error').html(value);
                            });
                            $().toastmessage('showErrorToast', 'Errors');
                        }else{
                            if(data.status == 401){
                              window.location.replace(baseURL);
                            }else{
                             $().toastmessage('showErrorToast', errorConnect);
                            }
                        }
                    }
                }
            });
        });
        $('#change-image').on('shown.bs.modal', function (e) {
            e.preventDefault();
            var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
            if ($.inArray($($file).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert('Unknown image format/encoding.');
                $('#change-image').modal('hide');
                return;
            }
            loadImage($file);
        });

        $('#product-image').click(function(){
            $('#file').click();
        });

        $("#file").change(function() {
            $file = this;
            if($(this).val().length > 0){
                $('.progress').removeClass('hide');
                loadImage(this);
            }
        });

        $('#load-btn').click(function(){
            $('#file').val("");
            $('#change-image').modal('hide');
            $('#file').click();
        });

        function loadImage(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            canvas = null;
            reader.onload = function(e) {
              image = new Image();
              image.onload = validateImage;
              image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);

            $('#submit-btn').removeClass('hide');
          }
        }

        function validateImage() {
            if (canvas != null) {
                image = new Image();
                image.onload = restartJcrop;
                image.src = canvas.toDataURL('image/png');
                $("#form").submit();
            } else restartJcropOpen();
        }

        function restartJcropOpen() {
            if(image.width < 160 || image.height < 160 || image.width > 3000 || image.height > 3000){
                $("#views").empty();
            }else{
                $('#change-image').modal('show');
                restartJcrop();
             }
        }

        function restartJcrop() {
            if (jcrop_api != null) {
                jcrop_api.destroy();
              }
              $("#views").empty();
              $("#views").append("<canvas id=\"canvas\">");
              canvas = $("#canvas")[0];
              context = canvas.getContext("2d");
              canvas.width = image.width;
              canvas.height = image.height;
              var imageSize = (image.width > image.height)? image.height : image.width;
              imageSize = (imageSize > 800)? 800: imageSize;
              context.drawImage(image, 0, 0);
              $("#canvas").Jcrop({
                onSelect: selectcanvas,
                onRelease: clearcanvas,
                boxWidth: crop_max_width,
                boxHeight: crop_max_height,
                // setSelect: [0,0,250,181],
                aspectRatio: 4/3,
                bgOpacity:   .4,
                bgColor:     'black'
              }, function() {
                jcrop_api = this;
              });
              clearcanvas();
            //   selectcanvas({x:0,y:0,w:250,h:181});  
        }

        function clearcanvas() {
          prefsize = {
            x: 0,
            y: 0,
            w: canvas.width,
            h: canvas.height,
          };
        }

        function selectcanvas(coords) {
          prefsize = {
            x: Math.round(coords.x),
            y: Math.round(coords.y),
            w: Math.round(coords.w),
            h: Math.round(coords.h)
          };
        }

        $('#submit-btn').click(function(){
            canvas.width = prefsize.w;
            canvas.height = prefsize.h;
            context.drawImage(image, prefsize.x, prefsize.y, prefsize.w, prefsize.h, 0, 0, canvas.width, canvas.height);
            validateImage();
        });

        $('#change-image').on('hidden.bs.modal', function () {
            $('#file').val("");
        })

        $("#form").submit(function(e) {
            e.preventDefault();
            $('#change-image').modal('hide');
            $('#product-image').removeClass('hide');
            formData = new FormData($(this)[0]);

            //---Add file blob to the form data
            formData.append("base64", canvas.toDataURL('image/png'));

            $.ajaxSetup(
            {
                headers:
                {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/') }}/admincp/uploadImage",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $("#image-loading").show();
                },
                success: function(data) {
                    $("#pre_ajax_loading").hide();
                    if(data.code == 200){
                        $('#product-image').attr('src', "{{ url('/') }}/image-avatars/" + data.image_url);
                        $('#image').val(data.image_url);
                        $('#change-image').modal('hide');
                        $("#views").empty();
                    }else{
                        $('#product-image').addClass('hide');
                        return;
                    }

                    $('#product-image').on('load', function () {
                        $("#image-loading").hide();
                    });

                    $('#file').val("");
                },
                error: function(data) {
                    alert("Error");
                },
                complete: function(data) {}
            });
        });
    });
</script>