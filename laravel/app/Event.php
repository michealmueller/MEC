<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 * @property string|null $backgroundColor
 * @property string|null $textColor
 * @property string|null $borderColor
 * @property int|null $allDay
 * @property string|null $brief_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereAllDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereBackgroundColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereBorderColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereBriefUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereTextColor($value)
 */
class Event extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['title','start_date','end_date', 'brief_url', 'comments', 'creator'];

    protected $table = 'events';

}
