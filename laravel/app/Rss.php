<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class Rss extends Model
{
    //
    protected $fillable = ['rss_title', 'rss_link', 'rss_pubDate', 'created_at'];

    protected $table = 'rsses';
}
