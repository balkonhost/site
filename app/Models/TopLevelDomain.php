<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopLevelDomain extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain',
        'idn',
        'new_min_period',
        'new_max_period',
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

    /**
     * The attributes that should be cast to datetime.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    public function providers(): BelongsToMany
    {
        return $this->belongsToMany(Provider::class);
        //return $this->belongsToMany(TopLevelDomain::class, 'provider_top_level_domain');
    }
}
