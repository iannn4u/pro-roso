<?php

namespace App\Models;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesan extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'id_pengirim', 'id_user');
    }

    public function file() {
        return $this->belongsTo(File::class, 'id_file', 'id_file');
    }
}
