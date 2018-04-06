<?php
/**
 * Created by PhpStorm.
 * User: jinyi
 * Date: 2018/4/6
 * Time: 17:06
 */

namespace App\Http\Controllers;
define("TOKEN", "yangyh");//自己定义的token 就是个通信的私钥

class WeixinController extends Controller
{
    public function __construct()
    {
        if (isset($_GET['echostr'])) {
            $this->valid();
        }else{
            $this->responseMsg();
        }
    }

    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            header('content-type:text');
            echo $echoStr;
            exit;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA); //获取数据
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <FuncFlag>0</FuncFlag>
            </xml>";
            if($keyword == "?" || $keyword == "？") //获取用户信息
            {
                $msgType = "text";
                $contentStr = date("Y-m-d H:i:s",time()); // 回复的内容
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
        }else{
            echo "";
            exit;
        }
    }
//    public function responseMsg()
//    {
//        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
//        if (!empty($postStr)){ //s
//            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
//            $fromUsername = $postObj->FromUserName;
//            $toUsername = $postObj->ToUserName;
//            $keyword = trim($postObj->Content);
//            $time = time();
//            $textTpl = "<xml>
//            <ToUserName><![CDATA[%s]]></ToUserName>
//            <FromUserName><![CDATA[%s]]></FromUserName>
//            <CreateTime>%s</CreateTime>
//            <MsgType><![CDATA[%s]]></MsgType>
//            <Content><![CDATA[%s]]></Content>
//            <FuncFlag>0<FuncFlag>
//            </xml>";
//            if(!empty( $keyword ))
//            {
//                $msgType = "text";
//                $contentStr = '你好啊，屌丝';
//                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
//                echo $resultStr;
//            }else{
//                echo '咋不说哈呢';
//            }
//        }else {
//            echo '咋不说哈呢';
//            exit;
//        }
//    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

}