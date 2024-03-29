<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Provider extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'created_at'
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

    public function domains(): BelongsToMany
    {
        return $this->belongsToMany(Domain::class, 'provider_domain');
    }

    public function topLevelDomains(): BelongsToMany
    {
        return $this->belongsToMany(TopLevelDomain::class, 'provider_top_level_domain');
    }
}
