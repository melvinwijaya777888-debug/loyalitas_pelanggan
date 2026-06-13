<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'email', 'kata_sandi', 'nama_customer', 'alamat', 'no_telp', 'jenis_kelamin',
        'point'];
}
