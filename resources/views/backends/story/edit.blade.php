@extends('backends.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading font-weight-bold text-uppercase"><h3><strong>Edit Truyện</strong></h3></div>
                    <div class="panel-body">
                        @include('backends.notification')
                        @include ('backends.story.form', ['submitButtonText' => 'Update'])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="change-image" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-image">

        <!-- Modal content-->
        <div class="modal-content">
            <form id="form" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input id="file" type="file" class="hide" accept="image/*">
                    <div id="views"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="load-btn">Load image</button>
                    <button type="button" class="btn btn-primary hide" id="submit-btn">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
      </div>
    </div>
@endsection
