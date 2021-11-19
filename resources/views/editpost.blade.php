@extends('layouts.master')

@section('title','EDIT POST')

@section('content')
<div class="row mt-3 mb-3">
    <div class="col-1"></div>
    <div class="col-10">

        <div class="card">

        </div>





        @foreach($post as $post)
        @if($post->user_id == Auth::user()->id)
        <div class="card mt-4">
            <div class="card-header">
                <img src="{{asset ('img/profil/' . $post->foto_post)}}" width="25px;" alt="">
                {{$post->name_post}} <br>
                <span class="badge text-muted ml-4" style="font-size:10px;">Memposting Sejak
                    {{$post->created_at->diffForHumans()}}</span>
            </div>

            <div class="card-body">
                <p class="card-text" style="font-family:Verdana, Geneva, Tahoma, sans-serif">{{$post->isi}}
                </p>
                <img src="{{asset ('img/post/' . $post->gambar)}}" class="card-img-top m-auto  img-fluid" width="5px">
                <div class="mb-2 mt-2">
                    <p class="text">{{$post->capt_gambar}}</p>
                </div>
                <a href="#" class="btn btn-primary float-right ml-1"><i class="fa fa-edit" style="font-size:20px;"></i>
                    Edit</a>
                <form action="/delete/{{$post->id}}" method="POST">
                    {{csrf_field()}}
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger float-right mr-1" value="Hapus">
                </form>
            </div>
            <div class="card-footer">
                <div>
                    <span class="badge">{{$post->komen->count() }} Komentar</span>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <div class="col-1"></div>
</div>
@endsection