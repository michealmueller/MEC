<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrganizationRequests
 *
 * @property int $id
 * @property int $user_id
 * @property int $organization_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrganizationRequests newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrganizationRequests newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrganizationRequests query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrganizationRequests whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrganizationRequests whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrganizationRequests whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrganizationRequests whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrganizationRequests whereUserId($value)
 * @mixin \Eloquent
 */
class OrganizationRequests extends Model
{
    //
    protected $table = 'requests';

    protected $fillable = [
        'user_id',
        'organization_id',
    ];

    public function user()
    {
        return $this->hasOne( User::class);
    }

}
