<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BadDomain extends Model
{
    /**
     * The table associated with the model.
     *
     * @var stringa
     */
    protected $table = 'bad_domains';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Check domain is bad
     *
     * @param $domain
     * @return bool
     */
    public static function isBadDomain($domain)
    {
        return self::where('name', $domain)->first() ? true : false;
    }
}
