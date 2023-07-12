@extends('user.layout.layout')
@section('content')
<h3>Uploadfile</h3>
<form action="{{ url('/demo4/upload') }}" method="post" enctype="multipart/form-data">
    {{-- entype uploadfile --}}
    @csrf
    photo <input type="file" name="photo" id="">
    <br>
    <input type="submit" value="Upload">
</form>
@endsection