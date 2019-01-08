<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Admin
 *
 * @property int $id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereUserId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin query()
 */
	class Admin extends \Eloquent {}
}

namespace App{
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
	class Attendance extends \Eloquent {}
}

namespace App{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Attendance[] $attending
 */
	class Event extends \Eloquent {}
}

namespace App{
/**
 * App\FirebaseNotify
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FirebaseNotify newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FirebaseNotify newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FirebaseNotify query()
 * @mixin \Eloquent
 */
	class FirebaseNotify extends \Eloquent {}
}

namespace App{
/**
 * App\gitCommitsLog
 *
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\gitCommitsLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\gitCommitsLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\gitCommitsLog query()
 */
	class gitCommitsLog extends \Eloquent {}
}

namespace App{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrganizationRequests[] $requests
 */
	class Organization extends \Eloquent {}
}

namespace App{
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
	class OrganizationRequests extends \Eloquent {}
}

namespace App{
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
	class OrgCalendar extends \Eloquent {}
}

namespace App{
/**
 * App\Profile
 *
 * @mixin \Eloquent
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile query()
 */
	class Profile extends \Eloquent {}
}

namespace App{
/**
 * App\RecentActivity
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecentActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecentActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecentActivity query()
 * @mixin \Eloquent
 */
	class RecentActivity extends \Eloquent {}
}

namespace App{
/**
 * App\Rss
 *
 * @property int $id
 * @property string $rss_title
 * @property string $rss_link
 * @property string $rss_pubDate
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereRssLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereRssPubDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereRssTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereDeletedAt($value)
 * @property string $rss_content
 * @property string $rss_contentExerpt
 * @property string $rss_feedImage
 * @property string $rss_feed
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereRssContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereRssContentExerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereRssFeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereRssFeedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss query()
 */
	class Rss extends \Eloquent {}
}

namespace App{
/**
 * App\Subscription
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $stripe_id
 * @property string $stripe_plan
 * @property string $braintree_id
 * @property string $braintree_plan
 * @property int $quantity
 * @property string|null $trial_ends_at
 * @property string|null $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereBraintreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereBraintreePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereStripePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereUserId($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App{
/**
 * App\Tracker
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tracker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tracker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tracker query()
 * @mixin \Eloquent
 */
	class Tracker extends \Eloquent {}
}

namespace App{
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
	class User extends \Eloquent {}
}

