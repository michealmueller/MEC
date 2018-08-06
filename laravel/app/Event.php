<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Event
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereUpdatedAt($value)
 * @property string $start_time
 * @property string $comments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereStartTime($value)
 */
class Event extends Model
{
    //
    protected $fillable = ['title','start_date','end_date', 'start_time', 'comments'];

    protected $table = 'events';

}
