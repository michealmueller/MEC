<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subscription
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription query()
 * @mixin \Eloquent
 */
class Subscription extends Model
{
    //

    protected $table = 'subscriptions';

    public function users()
    {
         return $this->hasMany(User::class);
    }
}
