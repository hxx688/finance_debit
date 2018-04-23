<!DOCTYPE html>
<html lang="en">

<script>

    @if( strlen($msg) > 0 )
            alert("{{$msg}}");
    @else
             window.location = '{{$link}}';
    @endif


</script>

</html>