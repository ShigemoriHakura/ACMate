<?php

namespace app\dao;

/**
 * 用户表
 */
class mateTypeDAO extends baseDAO
{
    protected $table = 'acmate_mate_type';
    protected $_pk = 'id';
    protected $_pkCache = false;
}