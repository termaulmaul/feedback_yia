<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    // Jika nama tabel bukan jamak dari nama model, tentukan di sini
    protected $table = 'feedbacks';

    // Jika nama primary key bukan 'id'
    protected $primaryKey = 'id';

    // Jika primary key adalah auto increment
    public $incrementing = true;

    // Jika menggunakan tipe data selain integer untuk primary key
    protected $keyType = 'int';

    // Jika timestamp tidak digunakan
    public $timestamps = false;

    // Jika model perlu mengisi atribut massal, tentukan di sini
    protected $fillable = ['facility_rating', 'staff_rating', 'process_rating', 'suggestion', 'contact_info'];
}
