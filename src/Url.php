<?php

namespace Gallib\ShortUrl;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shorturl_urls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'code',
    ];

    /**
     * Boot the model.
     *
     * @return  void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($url) {
            app()->make('url-parser')->setUrlInfos($url);
        });

        static::updating(function ($url) {
            app()->make('url-parser')->setUrlInfos($url);
        });
    }
}
