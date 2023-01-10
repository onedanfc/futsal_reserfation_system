<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lapangan extends Model
{
    use HasFactory;
    public $timestamps=true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Ticket(){
        return $this->hasMany(Ticket::class);
    }
    public function Transaksi(){
        return $this->hasMany(Transaksi::class);
    }
    protected $attributes = [
        'status' => 0,
   ];
}
