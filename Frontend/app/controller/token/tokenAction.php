<?php

namespace app\controller;
use App;
use biny\lib\Language;
use Constant;

class tokenAction extends baseAction
{
    /**
     * 令牌
     */
    public function action_index()
    {
		$this->response->redirect('/');
	}
	
	public function action_view($id)
    {
		if (!App::$model->user->exist()){
            $this->response->redirect('/login');
        }
        $userData = App::$model->user->values();
        $tokenData = $this->userConfigDAO->filter([
            'user_id' => $userData['id'],
            'id' => $id,
        ])->order(array('id'=>'ASC'))->find();
		if(!$tokenData){
			$this->response->redirect('/');
		}
		$giftData = $this->danmakuGiftTypeDAO->filter([
            'status' => 1,
        ])->order(array('id' => 'ASC'))->query();
        $mateTypeData = $this->mateTypeDAO->filter([
            'status' => 1,
        ])->order(array('id' => 'ASC'))->query();
		$config = json_decode($tokenData['configuration'], true);
        $tokenData["type_name"] = $mateTypeData[$tokenData['mate_type'] - 1]['name'];
		$tokenData["type_content"] = $mateTypeData[$tokenData['mate_type'] - 1]['content'];
        $tokenData["gift"] = $giftData[$config['gift'] - 1]['gift_name'];
        $tokenData["config"] = $config;
		return $this->display('token/detail', array(
            'tokenData' => $tokenData,
            'giftData' => $giftData,
            'id' => $id
        ));
    }

    //添加
    public function action_add()
	{
        if (!App::$model->user->exist()){
            $this->response->redirect('/login');
        }
        $form = $this->getForm('add');
        $mateTypeData = $this->mateTypeDAO->filter([
            'status' => 1,
        ])->order(array('id' => 'ASC'))->query();
        if (!$form->check()){
            return $this->display('token/add', array(
                'status' => false,
                'mateTypeData' => $mateTypeData,
            ));
        } else {
            $userData = App::$model->user->values();
            $tokenDataCount = $this->userConfigDAO->filter([
                'user_id'=>$userData['id'],
            ])->count();
            if($tokenDataCount >= 10){
                return $this->display('token/add', array(
                    'status' => false,
                    'mateTypeData' => $mateTypeData,
                ));
            }
            $sets = array(
                'user_id'   => $userData['id'],
                'up_id'     => $form->id,
                'mate_type'     => $form->type,
                'add_date'  => time(),
                'last_date' => time(),
                'token'     => $this->rand(8),
                'status'    => 1,
                'configuration'  => "{}",
            );
            // false 时返回true/false
            $status = $this->userConfigDAO->add($sets);
            if($status){
                $this->response->redirect('/t/' . $status);
            }
            return $this->display('token/add', array(
                'status' => $status,
                'mateTypeData' => $mateTypeData,
            ));
        }
    }

    //修改
    public function action_edit($tokenid)
    {
        if (!App::$model->user->exist()){
            $this->response->redirect('/login');
        }
        if(!$tokenid){
            $this->response->redirect('/');
        }
        $userData = App::$model->user->values();
        $tokenData = $this->userConfigDAO->filter([
            'user_id' => $userData['id'],
            'id' => $tokenid,
        ])->order(array('id'=>'ASC'))->find();
        if(!$tokenData){
            $this->response->redirect('/');
        }
        $oldConfig = json_decode($tokenData['configuration'], true);
        $config = $this->tokenConfigureService->getConfigureJson($tokenData['mate_type'], $this->request, $tokenData['up_id'], $oldConfig);
        if($config != "{}"){
            $sets = array(
                'last_date' => time(),
                'configuration'  => $config,
            );
            $this->userConfigDAO->filter(array('id' => $tokenid))->update($sets);
        }
        $this->response->redirect('/t/' . $tokenid);
    }

    //房间修改
    public function action_room($tokenid)
    {
        if (!App::$model->user->exist()){
            $this->response->redirect('/login');
        }
        if(!$tokenid){
            $this->response->redirect('/');
        }
        $userData = App::$model->user->values();
        $tokenData = $this->userConfigDAO->filter([
            'user_id' => $userData['id'],
            'id' => $tokenid,
        ])->order(array('id'=>'ASC'))->find();
        if(!$tokenData){
            $this->response->redirect('/');
        }
        if($this->request->post("room")){
            $sets = array(
                'last_date' => time(),
                'up_id'  => $this->request->post("room"),
            );
            $this->userConfigDAO->filter(array('id' => $tokenid))->update($sets);
        }
        $this->response->redirect('/t/' . $tokenid);
    }

    //删除
    public function action_delete($tokenid)
    {
        if (!App::$model->user->exist()){
            $this->response->redirect('/login');
        }
        if(!$tokenid){
            $this->response->redirect('/');
        }
        $userData = App::$model->user->values();
        $tokenData = $this->userConfigDAO->filter([
            'user_id' => $userData['id'],
            'id' => $tokenid,
        ])->order(array('id'=>'ASC'))->find();
        if(!$tokenData){
            $this->response->redirect('/');
        }
        $status = $this->userConfigDAO->filter(array('id' => $tokenid))->delete();
        $this->response->redirect('/manage');
    }

    //随机数
    public function rand($len)
    {
        $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $string=time();
        for(;$len>=1;$len--)
        {
            $position=rand()%strlen($chars);
            $position2=rand()%strlen($string);
            $string=substr_replace($string,substr($chars,$position,1),$position2,0);
        }
        return $string;
    }
}