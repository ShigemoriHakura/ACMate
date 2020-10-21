<?php

namespace app\dao;

/**
 * 用户表
 */
class userDataDAO extends baseDAO
{
    protected $table = 'acmate_user_data';
    protected $_pk = 'id';
    protected $_pkCache = false;
}