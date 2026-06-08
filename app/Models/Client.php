<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'rfc',
        'curp',
        'social_reason',
        'fiscal_regime',
        'address',
        'postal_code'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
