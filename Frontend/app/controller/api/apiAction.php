<?php

namespace app\controller;
use App;
use biny\lib\Language;
use Constant;

class apiAction extends baseAction
{
    /**
     * API
     */
    public function action_index()
    {
        return $this->displayJson(1, "Hello world");
    }
	
	public function action_liveapi($uperid)
    {
        if(!$uperid){
            return $this->displayJson(0, "No Up Id");
        }
        $url = "https://api-new.app.acfun.cn/rest/app/live/info?authorId=" . $uperid;
		$data = $this->curl_file_get_contents($url);
		return $data;
    }

    public function action_display($token)
    {
        if(!$token){
            return $this->display('api/notSet');
        }
        $tokenData = $this->userConfigDAO->filter([
            'status' => 1,
            'token'   => $token,
        ])->find();
        if(!$tokenData){
            return $this->display('api/notSet');
        } else {
            if($tokenData['configuration'] == "{}"){
                return $this->display('api/notSet');
            }
            return $this->display('api/display', array(
                'type' => $tokenData['mate_type']
            ));
        }
    }

    public function action_query($token)
    {
        if(!$token){
            return $this->displayJson(0, "No Token");
        }
        $tokenData = $this->userConfigDAO->filter([
            'status' => 1,
            'token'   => $token,
        ])->find();
        if(!$tokenData){
            return $this->displayJson(0, "Still No Token");
        } else {
            $config = json_decode($tokenData['configuration'], true);
            return $this->displayJson(1, $config);
        }
    }
	
	public function curl_file_get_contents($durl){
        // header传送格式
        $headers = array(
        );
        $user_agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36";

        // 初始化
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_USERAGENT,$user_agent);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );
        // 设置url路径
        curl_setopt($curl, CURLOPT_URL, $durl);
        // 将 curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true) ;
        // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        curl_setopt($curl, CURLOPT_BINARYTRANSFER, true) ;
        // 添加头信息
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // CURLINFO_HEADER_OUT选项可以拿到请求头信息
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        // 不验证SSL
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        // 执行
        $data = curl_exec($curl);
        // 打印请求头信息
//        echo curl_getinfo($curl, CURLINFO_HEADER_OUT);
        // 关闭连接
        curl_close($curl);
        // 返回数据
        return $data;
    }

}