<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain',
        'state',
        'creation_date',
        'expiration_date',
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

    protected $dispatchesEvents = [
        'created' => 'App\Events\Domain\Created',
        'updated' => 'App\Events\Domain\Updated',
        'deleted' => 'App\Events\Domain\Deleted'
    ];

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}
