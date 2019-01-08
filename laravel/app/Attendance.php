<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Attendance
 *
 * @property int $id
 * @property int $user_id
 * @property int $event_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Event $events
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereUserId($value)
 * @mixin \Eloquent
 */
class Attendance extends Model
{
    //

    protected $fillable = [
      'user_id', 'event_id', 'status', 'created_at', 'updated_at',
    ];

    protected $table = 'attendance';

    public function events(){
        return $this->hasone(Event::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

}
