<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @property string|null $org_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOrgName($value)
 * @property string|null $avatar
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @property string|null $organization_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read \App\Organization|null $organization
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOrganizationId($value)
 * @property string|null $username
 * @property int|null $lead
 * @property int $isAdmin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 * @property string|null $email_verified_at
 * @property string|null $stripe_id
 * @property string|null $braintree_id
 * @property string|null $paypal_email
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $trial_ends_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Attendance[] $attending
 * @property-read \App\OrganizationRequests $request
 * @property-read \App\Subscription $subed
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[] $subscriptions
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBraintreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePaypalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTrialEndsAt($value)
 * @property int $organization_requests_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOrganizationRequestsId($value)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'email',
        'password',
        'org_name',
        'username',
        'organization_id',
        'q',
        'org_rsi_site',
        'org_discord',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function subed()
    {
        return $this->hasOne(Subscription::class);
    }

    public function attending()
    {
        return $this->belongsToMany(Attendance::class);
    }

    public function request()
    {
        return $this->hasOne(OrganizationRequests::class);
    }

    public function recent()
    {
        return $this->hasMany(RecentActivity::class);
    }
}
