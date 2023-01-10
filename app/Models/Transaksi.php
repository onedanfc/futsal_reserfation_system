<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function lapangan(){
        return $this->belongsTo(lapangan::class);
    }
    protected $guarded = [
        'id'
    ];
}
