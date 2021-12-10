<?php

namespace TutorTonyM\Subscriber\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'subscriber_email',
        'subscribed_at',
        'unsubscribed_at',
    ];
}