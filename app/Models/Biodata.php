<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'foto',
            'nim',
            'thnLulus',
            'jk',
            'tempatLahir',
            'tglLahir',
            'agama',
            'pekerjaan',
            'kawin',
    ];
}