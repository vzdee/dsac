<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'client_id',
        'employee_id',
        'service_id',
        'scheduled_at',
        'status',
        'price',
        'payment_method',
        'payment_status',
        'notes',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'price' => 'integer',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function employee()
    {
        return $this->belongsTo(Accountant::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
