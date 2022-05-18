<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    use HasFactory;

    protected $fillable = [ 'name','value','user_id', ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
