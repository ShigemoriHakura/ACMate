<?php

namespace app\service;

use biny\lib\Service;
use App;

class tokenConfigureService extends Service
{
    public function getConfigureJson($type, $request, $up_id, $oldConfig)
    {
        $config = "{}";
        switch ($type) {
            case 1: //礼物目标
                $config = $this->handleGiftAmount($request, $up_id, $oldConfig);
                break;
            case 2: //关注者目标
                $config = $this->handleFollowerAmount($request, $up_id);
                break;
            case 3: //弹幕播报
                $config = $this->handleTTS($request, $up_id);
                break;
            case 4: //礼物加减钟
                $config = $this->handleGiftLiveTimeAmount($request, $up_id, $oldConfig);
                break;
            case 5: //弹幕播报
                $config = $this->handleLiveTimeAmount($request, $up_id);
                break;
        }
        return $config;
    }

    public function handleGiftAmount($request, $up_id, $oldConfig){
        $config = "{}";
        switch ($request->post("action")){
            case "add":
                $gift = $request->post("gift");
                $amount = $request->post("amount");
                if($gift && $amount){
                    $giftData = $this->danmakuGiftTypeDAO->filter([
                        'status' => 1,
                        'id' => $gift,
                    ])->find();
                    if($giftData){
                        $configArray = array(
                            "roomID" => $up_id,
                        );
                        foreach ($oldConfig['gifts'] as $gift){
                            if($gift['gift_name'] != $giftData['gift_name']){
                                $configArray['gifts'][] = $gift;
                            }
                        }
                        $configArray['gifts'][] = array(
                            "gift_name" => $giftData['gift_name'],
                            "gift_icon" => $giftData['gift_avatar_url'],
                            "gift_amount" => $amount
                        );
                        $config = json_encode($configArray);
                    }
                }
                break;
            case "delete":
                $gift_name = $request->post("gift");
                if($gift_name){
                    $configArray = array(
                        "roomID" => $up_id,
                    );
                    foreach ($oldConfig['gifts'] as $gift){
                        if($gift['gift_name'] != $gift_name){
                            $configArray['gifts'][] = $gift;
                        }
                    }
                    $config = json_encode($configArray);
                }
                break;
        }
        return $config;
    }

    public function handleFollowerAmount($request, $up_id){
        $config = "{}";
        $amount = $request->post("amount");
        if($amount){
            $configArray = array(
                "roomID" => $up_id,
                "amount" => $amount
            );
            $config = json_encode($configArray);
        }
        return $config;
    }

    public function handleTTS($request, $up_id){
        $config = "{}";
        $speed  = $request->post("speed");
        $pitch  = $request->post("pitch");
        $volume = $request->post("volume");
        $person = $request->post("person");
        $gift   = $request->post("gift");
        if($gift){
            $gift = true;
        }
        if( $speed && $pitch && $volume){
            $configArray = array(
                "roomID" => $up_id,
                "speed" => $speed,
                "pitch" => $pitch,
                "volume" => $volume,
                "person" => $person,
                "gift"   => $gift
            );
            $config = json_encode($configArray);
        }
        return $config;
    }

    public function handleGiftLiveTimeAmount($request, $up_id, $oldConfig){
        $config = "{}";
        switch ($request->post("action")){
            case "add":
                $gift = $request->post("gift");
                $amount = $request->post("amount");
                $type = $request->post("type");
                if($gift && $amount && $type){
                    $giftData = $this->danmakuGiftTypeDAO->filter([
                        'status' => 1,
                        'id' => $gift,
                    ])->find();
                    if($giftData){
                        $configArray = array(
                            "roomID" => $up_id,
                            "liveTime" => $oldConfig['liveTime'],
                            "liveText" => $oldConfig['liveText']
                        );
                        if(empty($oldConfig)){
                            $configArray['liveTime'] = 2;
                            $configArray['liveText'] = "(/=-=)/";
                        }
                        foreach ($oldConfig['gifts'] as $gift){
                            if($gift['gift_name'] != $giftData['gift_name']){
                                $configArray['gifts'][] = $gift;
                            }
                        }
                        $configArray['gifts'][] = array(
                            "gift_name" => $giftData['gift_name'],
                            "gift_icon" => $giftData['gift_avatar_url'],
                            "gift_amount" => $amount,
                            "gift_type" => $type
                        );
                        $config = json_encode($configArray);
                    }
                }
                break;
            case "modify":
                $live = $request->post("live");
                $text = $request->post("text");
                if($live && $text){
                    $oldConfig['liveTime'] = $live;
                    $oldConfig['liveText'] = $text;
                    $config = json_encode($oldConfig);
                }
                break;
            case "delete":
                $gift_name = $request->post("gift");
                if($gift_name){
                    $configArray = array(
                        "roomID" => $up_id,
                        "liveTime" => $oldConfig['liveTime'],
                        "liveText" => $oldConfig['liveText']
                    );
                    foreach ($oldConfig['gifts'] as $gift){
                        if($gift['gift_name'] != $gift_name){
                            $configArray['gifts'][] = $gift;
                        }
                    }
                    $config = json_encode($configArray);
                }
                break;
        }
        return $config;
    }

    public function handleLiveTimeAmount($request, $up_id){
        $config = "{}";
        $live = $request->post("live");
        $text1 = $request->post("text1");
        $text2 = $request->post("text2");
        if($live && $text1 && $text2){
            $configArray = array(
                "roomID" => $up_id,
                "liveTime" => $live,
                "liveText1" => $text1,
                "liveText2" => $text2
            );
            $config = json_encode($configArray);
        }
        return $config;
    }

}