@extends('app') @section('title') Upload @stop @section('content')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-image').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<form id="form1">
  <input type='file' onchange="readURL(this);" /> <img
    id="profile-image" src="#" alt="your image" />
</form>
@stop
