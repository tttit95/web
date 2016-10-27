@extends('layout.index')
@section('content')
<div class="col-sm-8">
	@foreach($baiviet as $bv)
	<div class="div-3">
		<span>{{$bv->created_at}} | by <a href="trangchu">Trần Thanh Tài</a> | <a href="trangchu/theloai/{{$bv->theloai->id}}/{{$bv->theloai->TenKhongDau}}.html">{{$bv->theloai->Ten}}</a></span>
		<h2><a href="baiviet/chitiet/{{$bv->id}}/{{$bv->TieuDeKhongDau}}.html">{{$bv->TieuDe}}</a></h2>
		<p>{!!$bv->TomTat!!} </p>
		<a href="baiviet/chitiet/{{$bv->id}}/{{$bv->TieuDeKhongDau}}.html">Readmore</a>
	</div>
	@endforeach
	<div class="div-4">
		{{$baiviet->links()}}
	</div>
</div>
<div class="col-sm-1"></div>
@endsection