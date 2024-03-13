<?php


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProviderTopLevelDomain extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id',
        'top_level_domain_id',
        'new_price',
        'renew_price',
        'retail_new_price',
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

    public function topLevelDomain(): hasOne
    {
        return $this->hasOne(\App\Models\TopLevelDomain::class);
    }

    public function provider(): hasOne
    {
        return $this->hasOne(\App\Models\Provider::class);
    }
}
