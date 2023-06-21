<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tld extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tld',
        'idn',
        'reg_min_period',
        'reg_max_period',
        'renew_min_period',
        'renew_max_period',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // ...
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // ...
    ];

    public function prices(): HasMany
    {
        return $this->hasMany(TldPrice::class);
    }

    public function active()
    {
        return $this->join('provider_tld', 'provider_tld.tld_id', 'tlds.id');
    }
}
