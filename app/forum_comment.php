<?php
/**
 * Created by PhpStorm.
 * User: 54976
 * Date: 2017/11/19
 * Time: 19:25
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class forum_comment extends Model
{
    protected $table = 'forum';

    //protected $primaryKey = 'title';

    public $timestamps = true;

    protected function  getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }
}