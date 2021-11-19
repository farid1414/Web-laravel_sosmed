<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profil extends Model
{

    protected $table = "profil";
    protected $fillable = ['first_name', 'last_name', 'jenis_kelamin', 'tgl_lahir', 'foto', 'pendidikan', 'bio'];

    public $timestamps = false;


    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}