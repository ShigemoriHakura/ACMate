<?
namespace app\form;
use biny\lib\Form;


class addForm extends Form
{
    protected $_rules = [
        'id'=>[self::typeInt],
        'type'=>[self::typeInt],
    ];

}