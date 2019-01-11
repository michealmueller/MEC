<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RecentActivity
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecentActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecentActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecentActivity query()
 * @mixin \Eloquent
 */
class RecentActivity extends Model
{
    //
    protected $table = 'recent_activity';
    protected $fillable = [
        'user_id',
        'message',
    ];

    public function user()
    {
        $this->hasOne(User::class);
    }
}
