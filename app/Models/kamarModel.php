<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamarModel extends Model
{
    use HasFactory;
    protected $table="kamars";
    protected $fillable = ['title', 'image', 'desc', 'type'];
}
