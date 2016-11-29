<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    /**
     * The table associated with the model.
     *
     * @var stringa
     */
    protected $table = 'click';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ua', 'ref', 'ip', 'param1', 'param2', 'id', 'bad_domain'];

    /**
     * Generate unik id
     *
     * @return int
     */
    public static function generateUnikId()
    {
        $result = self::select('id')
            ->orderBy('id', 'desc')
            ->first();

        return $result ? ++$result->id : 1;
    }

    /**
     * Update Error
     *
     * @param $referer
     * @param $param1
     * @param $error
     */
    public static function updateClick($referer, $param1, $error, $badDomain = 0)
    {
        $update = [
            'bad_domain' => $badDomain
        ];

        if ($error !== false) {
            $update = array_add($update, 'error', ++$error);
        }
        self::where('ref', $referer)
            ->where('param1', $param1)
            ->update($update);
    }


    /**
     * @return int
     */
    public static function getLastInsertId()
    {
        return self::generateUnikId() - 1;
    }
}
