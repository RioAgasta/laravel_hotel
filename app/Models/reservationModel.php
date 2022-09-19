<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservationModel extends Model
{
    use HasFactory;
    protected $table="reservations";
    protected $fillable = ['nama', 'namakamar', 'nik', 'email', 'type', 'cekin', 'cekout', 'jumlah'];
}
