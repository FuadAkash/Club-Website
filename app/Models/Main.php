<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    protected $fillable = [
        'icon_img', 'ic_title', 'ic_sub_title', 'title', 'sub_title', 'bc_img', 'bc_imga', 'bc_imgb'
    ];
}
