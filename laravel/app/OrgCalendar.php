<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\OrgCalendar
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\OrgCalendar onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\OrgCalendar withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\OrgCalendar withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $cal_url
 * @property int $organization_id
 * @property int $public
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Organization[] $shared
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar whereCalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrgCalendar whereUpdatedAt($value)
 */
class OrgCalendar extends Model
{
    use SoftDeletes;
    //
    protected $table = 'calendars';
    protected $fillable = [
        'cal_url',
        'organization_id',
        'public',
    ];

    public function shared()
    {
        return $this->hasMany(Organization::class);
    }

}
