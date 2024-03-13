<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'participants',
        'title',
        'description',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return Admin::whereIn('id', $this->participants);
    }

    public function setParticipantsAttribute($value)
    {
        $this->attributes['participants'] = json_encode($value);
    }

    public function getParticipantsAttribute($value)
    {
        return json_decode($value);
        //return $this->attributes['participants'] = json_decode($value);
    }

    // new laravel 9
    // single non-prefix method
    public function created_at(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value->diffForHumans(),
            // set: fn ($value) => $value,
        );
    }
}
