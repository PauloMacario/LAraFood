<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    
    protected $fillable = [
        'cnpj','name','url','email','logo','active',
        'subscription','expires_at','subscription_id',
        'subscription_active','subscription_suspended','plan_id'
    ];

    public function users()
    {
        return $this->hanMany(User::class);
    }

    public function plans()
    {
        return $this->belongsTo(Tenant::class);
    }
}