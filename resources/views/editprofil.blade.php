@extends('layouts.master')

@section('title', 'EDIT')

@section('content')
<div class="row mt-3 mb-3">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Profil {{Auth:: user()->name}}</h5>
                <form action="/update/{{auth()->user()->profil->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{auth()->user()->profil->first_name}}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{auth()->user()->profil->last_name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label> <br>
                        <div class="form-check  form-check-inline ">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1"
                                value="Laki-Laki" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check  form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios2"
                                value="Perempuan">
                            <label class="form-check-label" for="exampleRadios2">
                                Perempuan
                            </label>
                        </div>
                        <div class="form-check  form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios2"
                                value="Others">
                            <label class="form-check-label" for="exampleRadios2">
                                Others
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                            value="{{auth()->user()->profil->tgl_lahir}}">
                    </div>
                    <div class="form-group">
                        <label for="foto">foto Profil</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        @error('foto')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan Anda Saat ini</label>
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                            value="{{auth()->user()->profil->pendidikan}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Bio</label>
                        <textarea class="form-control" name="bio" placeholder="Tulis Bio anda disini"
                            id="exampleFormControlTextarea1" rows="3">{{auth()->user()->profil->bio}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>
@endsection