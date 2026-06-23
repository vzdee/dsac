<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Client extends Model
{
    //
    use SoftDeletes;
    use HasRoles;

    protected $fillable = [
        'user_id',
        'rfc',
        'curp',
        'social_reason',
        'fiscal_regime',
        'address',
        'postal_code',
        'state',
        'municipality'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
