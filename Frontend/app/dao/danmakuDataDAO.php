<?php

namespace app\dao;

/**
 * 用户表
 */
class danmakuDataDAO extends baseDAO
{
    protected $table = 'acmate_danmaku_data';
    protected $_pk = 'id';
    protected $_pkCache = false;
}