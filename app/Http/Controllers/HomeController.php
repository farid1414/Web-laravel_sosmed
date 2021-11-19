<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\User;
use App\Models\Post;
use App\Models\Komen;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use File;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $post = \App\Models\Post::all();
        $user = \App\Models\User::all();
        return view('/index', compact('post', 'user'));
    }
    public function regis()
    {
        return view('/regis');
    }
    public function edit($id)
    {
        $user = \App\Models\User::find($id);
        return view('/editprofil', compact('user'));
    }
    public function editpost($id)
    {
        $user = \App\Models\User::find($id);
        $post = Post::all();
        return view('/editpost', compact('user', 'post'));
    }
    public function postingan(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,giv,svg|max:2500',
        ]);


        if ($request->hasFile('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();

            $post = Post::create([
                'user_id' => auth()->user()->id,
                'name_post' => auth()->user()->name,
                'foto_post' => auth()->user()->profil->foto,
                'isi' => $request->isi,
                'gambar' => $new_gambar,
                'capt_gambar' => $request->capt_gambar,
            ]);
            $gambar->move('img/post/', $new_gambar);
        } else {
            $post = Post::create([
                'user_id' => auth()->user()->id,
                'name_post' => auth()->user()->name,
                'isi' => $request->isi,
            ]);
        }

        return redirect('/');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,giv,svg|max:2500',
        ]);

        $profil = \App\Models\Profil::findorfail($id);
        if ($request->has('foto')) {
            $path = "img/profil/";
            File::delete($path  .  $profil->foto);
            $foto = $request->foto;
            $new_foto = time() . ' - ' . $foto->getClientOriginalName();
            $foto->move('img/profil/', $new_foto);

            $profil_post = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'foto' => $new_foto,
                'pendidikan' => $request->pendidikan,
                'bio' => $request->bio,
            ];
        } else {
            $profil_post = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'pendidikan' => $request->pendidikan,
                'bio' => $request->bio,
            ];
        }
        $profil->Update($profil_post);
        return redirect('/');
    }

    public function komen(Request $request, $id)
    {
        $query = Komen::create([
            'post_id' => $id,
            'name_komen' => auth()->user()->name,
            'isi_komen' => $request->isi_komen,
        ]);
        return redirect('/');
    }

    public function showpassword($id)
    {
        $user = User::find($id);
        return view('/showedit');
    }
    public function gantipassword(Request $request, $id)
    {
        $this->validate($request, [
            'passwordbaru' => 'required|min:6'
        ]);

        $user = User::find($id);
        if (Hash::check($request->password, $user->password)) {
            $user->update([
                'password' => bcrypt($request->passwordbaru)
            ]);
            return redirect('/')->with('sukses', 'Password berhasil diubah');
        } else {
            return redirect('/')->with('gagal', 'Password lama anda salah');
        }
    }
}