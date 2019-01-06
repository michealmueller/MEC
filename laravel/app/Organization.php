<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * App\Organization
 *
 * @property int $id
 * @property string|null $org_logo
 * @property string $org_name
 * @property string $org_rsi_site
 * @property string|null $org_discord
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrgCalendar[] $calendars
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization whereOrgDiscord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization whereOrgLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization whereOrgName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization whereOrgRsiSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $refHash
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Organization whereRefHash($value)
 */
class Organization extends Model
{
    //
    use SearchableTrait;

    protected $fillable = [
        'org_logo',
        'org_name',
        'org_rsi_site',
        'org_discord',
    ];
    protected $searchable = [
      'columns'=>[
          'organizations.org_name' => 1,
      ]
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function calendars()
    {
        return $this->hasOne(OrgCalendar::class);
    }

}
