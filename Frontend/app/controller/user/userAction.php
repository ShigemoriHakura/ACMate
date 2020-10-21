<?php

namespace app\controller;
use App;
use biny\lib\Language;
use Constant;

class userAction extends baseAction
{
    /**
     * 用户
     */
    public function action_index()
    {
        if (!App::$model->user->exist()){
            $this->response->redirect('/login');
        }
        $userData = App::$model->user->values();
        $tokenData = $this->userConfigDAO->filter([
            'user_id'=>$userData['id'],
        ])->order(array('id'=>'ASC'))->query();
        $mateTypeData = $this->mateTypeDAO->filter([
            'status' => 1,
        ])->order(array('id' => 'ASC'))->query();
		foreach($tokenData as $k => $token){
			$tokenData[$k]["type"] = $mateTypeData[$token['mate_type'] - 1]['name'];
		}
        return $this->display('user/token', array(
            'tokenData' => $tokenData,
        ));
    }

    public function action_login()
    {
        if (App::$model->user->exist()){
            $this->response->redirect('/');
        }
        $form = $this->getForm('login');
        if (!$form->check()){
            // 获取错误信息
            $error = $form->getError();
            return $this->display('user/login' , array(
                "message" => $error,
            ));
        }else{
            if ($user = $this->userDataDAO->filter(['username'=>$form->username])->find()){
                if($user['password'] == md5(sha1(md5($form->password)))){
                    App::$model->user($user['id'])->login($user['id']);
                }else{
                    return $this->display('user/login' , array(
                        "message" => "X",
                    ));
                }
            } else {
                return $this->display('user/login' , array(
                    "message" => "X",
                ));
            }
            if ($lastUrl = App::$base->session->lastUrl){
                unset(App::$base->session->lastUrl);
                $this->response->redirect($lastUrl);
            } else {
                $this->response->redirect('/');
            }
        }
    }

    public function action_register()
    {
        if (App::$model->user->exist()){
            $this->response->redirect('/');
        }
        $form = $this->getForm('register');
        if (!$form->check()){
            $error = $form->getError();
            return $this->display('user/register' , array(
                "message" => $error,
            ));
        }else{
            if ($user = $this->userDataDAO->filter(['username'=>$form->username])->find()) {
                return $this->display('user/register' , array(
                    "message" => "Register_Isset",
                ));
            }else{
                $pass = md5(sha1(md5($form->password)));
                $sets = array(
                    'username'  => $form->username,
                    'password'  => $pass,
                    'email'     => $form->email,
                    'add_date'  => time(),
                    'last_login_date'  => 0,
                    'status'    => 1
                );
                // false 时返回true/false
                $status = $this->userDataDAO->add($sets, false);
				if($status){
					$this->response->redirect('/login');
				}else{
					return $this->display('user/register', array(
						'status' => $status
					));
				}
            }
        }
    }

    public function action_logout()
    {
        if (App::$model->user->exist()){
            App::$model->user->loginOut();
        }
        if ($lastUrl = App::$base->session->lastUrl){
            unset(App::$base->session->lastUrl);
            $this->response->redirect($lastUrl);
        } else {
            $this->response->redirect('/');
        }
    }
}