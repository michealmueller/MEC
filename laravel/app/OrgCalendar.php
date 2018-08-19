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
 */
class OrgCalendar extends Model
{
    use SoftDeletes;
    //
    protected $table = 'calendars';
    protected $fillable = [
        'cal_url',
        'org_id',
        'public',
    ];

    public function shared()
    {
        return $this->hasMany(Organization::class);
    }

}
