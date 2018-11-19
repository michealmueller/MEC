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
 * @property string|null $creator
 * @property string|null $deleted_at
 * @property string|null $organization_id
 * @property int|null $private
 * @property-read \App\Organization $org
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Event onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCreator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event wherePrivate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Event withoutTrashed()
 * @property-read \App\Organization|null $organization
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event query()
 */
class Event extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['title','start_date','end_date', 'brief_url', 'comments', 'creator'];

    protected $table = 'events';

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
