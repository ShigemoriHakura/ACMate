<?php

namespace app\dao;

/**
 * 用户表
 */
class userConfigDAO extends baseDAO
{
    protected $table = 'acmate_user_configuration';
    protected $_pk = 'id';
    protected $_pkCache = false;
}