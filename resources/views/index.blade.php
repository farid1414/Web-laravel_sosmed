@extends('layouts.master')

@section('title','INDEX')
@section('sidebar')
<div class="position-fixed">
    <h6 style="font-size: 15px;">Teman Anda yang sudah Join 7book</h6>
    <ul class="list-group ">
        @foreach($user as $user)
        <li class="list-group-item" aria-disabled="true">{{$user->name}} <a href=""
                class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i></a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
@section('content')
@if(session('sukses'))
<div class="alert alert-primary" role="alert">
    {{session('sukses')}}
</div>
@endif
@if(session('gagal'))
<div class="alert alert-danger" role="alert">
    {{session('gagal')}}
</div>
@endif
<div class="row mt-3 mb-3">
    <div class="col-1"></div>
    <div class="col-10">

        <div class="card">
            <div class="card-body">
                <p class="card-text ml-4"><a href="" style="text-decoration:none;color:gray; font-size:20px;"
                        data-toggle="modal" data-target="#exampleModal">Apa yang
                        anda pikirkan,
                        {{auth()->user()->name}} ?</a></p>
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah
                    Post</a>

            </div>
        </div>
        @foreach($post as $postingan)
        <div class="card mt-4">
            <div class="card-header" style="font-family: sans-serif; font-weight:bold">
                <img src="{{asset ('img/profil/' . $postingan->foto_post)}}" width="25px;" alt="">
                {{$postingan->name_post}} <br>
                <span class="badge text-muted ml-4" style="font-size:10px;">Memposting Sejak
                    {{$postingan->created_at->diffForHumans()}}</span>
            </div>

            <div class="card-body">
                <p class="card-text" style="font-family:Verdana, Geneva, Tahoma, sans-serif">{{$postingan->isi}}
                </p>
                <img src="{{asset ('img/post/' . $postingan->gambar)}}" class="card-img-top m-auto  img-fluid"
                    width="5px">
                <div class="mb-2 mt-2">
                    <p class="textr">{{$postingan->capt_gambar}}</p>
                </div>

            </div>
            <span class="border-bottom" style="border: solid 2px gray;"> </span>
            <div>
                @foreach($postingan->komen()->orderBy('created_at', 'desc')->get() as $komentar)
                <div class="ml-4" style="font-weight: bold; font-size:16px;">
                    {{$komentar->name_komen}} <br>
                </div>
                <div class="ml-5">
                    {{$komentar->isi_komen}} <br>
                </div>
                <span class="badge text-muted ml-4"
                    style="font-size:10px;">{{$komentar->created_at->diffForHumans()}}</span> <br>
                @endforeach
            </div>
            <div class="card-footer">
                <div>
                    <span class="badge">{{$postingan->komen->count() }} Komentar</span>
                </div>
                <div>
                    <form action="/komen/{{$postingan->id}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea class="form-control" name="isi_komen" id="" rows="2"
                                placeholder="Tulis komentar anda disini"></textarea>
                        </div>
                        <button type="submit" class="btn-sm btn-primary float-right"><i
                                class="	fa fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-1"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Postingan Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/postingan" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Buat postingan anda disini</label>
                        <textarea class="form-control" name="isi" id="exampleFormControlTextarea1"
                            placeholder="Apa yang anda pikirkan, {{auth()->user()->name}}" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Tambahkan Gambar</label>
                        <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
                        @error('gambar')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="caption">Tambahkan caption untuk gambar anda</label>
                        <input type="text" name="capt_gambar" class="form-control  form-control-sm" id="caption"
                            placeholder="isi caption untuk gambar anda disini">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Posting</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
$(document).ready(function() {
    $('#btn-komentar').click(function() {
        $('#komentar-utama').toggle('slide');
    });
});
</script>

@endpush