<!-- @if( session('flash_message_err') )
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ session('flash_message_err') }}
  </div>
@endif

@if( session('flash_message_succ') )
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ session('flash_message_succ')  }}
  </div>
@endif -->

<!-- @if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif -->

@if (session('flash_message_err') != '')
  <script type="text/javascript">
    var errors = '<?php echo session("flash_message_err"); ?>';
    $().toastmessage('showErrorToast', errors);
  </script>
@endif

@if (session('flash_message_succ') != '')
  <script type="text/javascript">
    var success = '<?php echo session("flash_message_succ"); ?>';
    $().toastmessage('showSuccessToast', success);
  </script>
@endif