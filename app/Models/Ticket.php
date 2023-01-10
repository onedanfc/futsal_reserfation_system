<?php

namespace App\Models;

use App\Models\User;
use App\Models\lapangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
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

    public function lapangan(){
        return $this->belongsTo(lapangan::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
