<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loyalty extends Model
{
    protected $table = 'loyaltys';
    protected $fillable = [
        'nama_program', 'expired', 'produk_id', 'qty', 'diskon', 'point'];
}
