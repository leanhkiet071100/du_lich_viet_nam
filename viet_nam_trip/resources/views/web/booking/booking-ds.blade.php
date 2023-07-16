@extends('web.layouts.app')

@section('content')
    @parent
    {{-- @include('web.includes.banner') --}}
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#location').addClass('active');
    });

</script>

@endsection
