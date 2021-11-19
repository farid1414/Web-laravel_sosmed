<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Komen extends Model
{
    protected $table = "komen";
    protected $fillable = ['post_id', 'name_komen', 'isi_komen', 'like', 'created_at'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}