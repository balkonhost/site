<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TldPrice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tld_id',
        'provider_id',
        'reg_price',
        'renew_price',
        'retail_reg_price',
        'retail_renew_price',
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

    public function tld(): hasOne
    {
        return $this->hasOne(Tld::class);
    }

    public function provider(): hasOne
    {
        return $this->hasOne(Provider::class);
    }
}
