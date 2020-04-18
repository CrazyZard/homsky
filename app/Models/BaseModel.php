<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of BaseModel
 * Date 2018/6/11
 * @author xiaoyukarl
 */

class BaseModel extends Model
{
    const CREATED_AT = 'createTime';
    const UPDATED_AT = 'updateTime';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getImageAttribute($value)
    {
        if(!preg_match('/^http/i',$value)){
            $value = url('upload/'.$value);
        }
        return $value;
    }

    public function getIconAttribute($value)
    {
        if(!preg_match('/^http/i',$value)){
            $value = url('upload/'.$value);
        }
        return $value;
    }

    /**
     * @param int $num
     * @return string
     * hank
     * 获取随机数据 用于初始化密码等
     */
    protected static function getAllRandCode($num = 20)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $strRnds = '';
        for ($i = 0; $i < $num; $i++) {
            $strRnds .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $strRnds;
    }

    /**
     * @return string
     * hank
     * 获取昵称
     */
    protected static function getNickName()
    {
        $randName = self::getNumRand(5);
        return config('app.name'). $randName;
    }

    /**
     * @param $num
     * @return string
     * hank
     * 数字验证码
     */
    protected static function getNumRand($num) {
        $str = '';
        for ($i = 0; $i < $num; $i++) {
            $str .= mt_rand(0, 9);
        }
        return $str;
    }

    /**
     * @param string $preKey
     * @param int $num
     * @return string
     * hank
     * 随机数，文件名或订单号
     */
    protected static function getRandNum($preKey='', $num=5)
    {
        $str = '';
        for ($i = 0; $i < $num; $i++) {
            $str .= mt_rand(0, 9);
        }
        return $preKey . date("ymdHis", time()) . $str;
    }
}