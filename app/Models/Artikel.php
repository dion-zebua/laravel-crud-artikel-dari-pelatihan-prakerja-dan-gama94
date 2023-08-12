<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $tabel = 'Artikel';

    protected $guarded = ['id'];

    protected $fillable = ['title', 'thumbnail', 'slug', 'description'];
}
