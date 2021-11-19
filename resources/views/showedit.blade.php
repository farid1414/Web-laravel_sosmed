@extends('layouts.master')

@section('title', 'EDIT PASS')

@section ('content')
<style>
.card {
    width: 80%;
    margin-top: 6%;
}

label {
    font-size: 20px;
    font-family: 'Times New Roman', Times, serif;
    margin-left: 2%;
}

.form-control {
    width: 90%;
    margin-left: 2%;
    background-color: rgb(211, 211, 211, 0.4);
}

.btn {
    margin-right: 2%;
    margin-bottom: 2%;
}

p {
    font-family: monospace;
    text-align: center;
    font-size: 30px;
    font-weight: bold;
}
</style>

<div class="card ml-3">
    <p>Ganti Password</p>
    <form action="/editpassword/{{auth()->user()->id}}" method="POST">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="password" class="form-label">Password Lama</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3{{$errors->has('passwordbaru') ? 'has-error' : ''}}">
            <label for="tugas" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="tugas" name="passwordbaru">
            @if($errors->has('passwordbaru'))
            <span class="help-block">{{$errors->first('passwordbaru')}}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary pull-right">RESET</button>
</div>
</form>
</div>
@endsection