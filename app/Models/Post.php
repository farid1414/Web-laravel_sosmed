<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class Post extends Model
{
    protected $table = "post";
    protected $fillable = ['user_id', 'name_post', 'foto_post', 'isi', 'gambar', 'capt_gambar', 'created_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function komen()
    {
        return $this->hasMany('App\Models\Komen');
    }
}