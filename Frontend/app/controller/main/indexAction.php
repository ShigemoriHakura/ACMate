<?php

namespace app\controller;
use App;

class indexAction extends baseAction
{
    /**
     * 首页
     */
    public function action_index()
    {
        $userCount = $this->userDataDAO->count();
        $mateTypeCount = $this->mateTypeDAO->count();
        $giftTypeCount = $this->danmakuGiftTypeDAO->count();
        $userConfigCount = $this->userConfigDAO->count();
        return $this->display('main/index', array(
            'userCount' => $userCount,
            'giftCount' => $giftTypeCount,
            'userConfigCount' => $userConfigCount,
            'mateTypeCount' => $mateTypeCount,
        ));
    }

}