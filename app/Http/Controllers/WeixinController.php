<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller; //addaa
use Log;
class WeixinController extends Controller {
    public function index(){
        Log::info('www',$_GET);
        if(isset($_GET['echostr'])){
            $timestamp = $_GET['timestamp'];//timestamp其实就是一个时间戳
            $nonce     = $_GET['nonce'];//nonce是一个随机参数
            $token     = "weixin";//这个token填写你在微信公众平台上写的那个值
            $signature = $_GET['signature'];//这个signature其实就是在微信公众平台已经加密好的字符串
            $echostr   = $_GET['echostr'];
            $array     = array( $timestamp, $nonce, $token);
            sort($array);

            $tmpstr = implode('', $array);
            $tmpstr = sha1($tmpstr);

            if( $tmpstr == $signature && $echostr){

                echo $echostr;
                exit;
            }else{
                $this->reponseMsg();
            }
        }else{
            $this->reponseMsg();
        }
//        $this->reponseMsg();
    }
    public function reponseMsg(){
//        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        $postArr = file_get_contents('php://input');
        $postObj = simplexml_load_string( $postArr );
        Log::info('uuuxx',['postArr'=>$postArr]);
        if( strtolower( $postObj->MsgType) == 'event'){
            //如果是关注事件(subscribe)
            if( strtolower($postObj->Event == 'subscribe') ){
                //回复用户消息
                $toUser   = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time     = time();
                $msgType  =  'text';
                $content  = '欢迎关注 锦衣 微信公众账号'.$postObj->FromUserName.'-'.$postObj->ToUserName;
                $template = "<xml>  
                            <ToUserName><![CDATA[%s]]></ToUserName>  
                            <FromUserName><![CDATA[%s]]></FromUserName>  
                            <CreateTime>%s</CreateTime>  
                            <MsgType><![CDATA[%s]]></MsgType>  
                            <Content><![CDATA[%s]]></Content>  
                            </xml>";
                $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
                echo $info;
            }
        }
//回复纯文本或单图文消息
        if(($postObj->MsgType) == 'text' &&  preg_match('/(?=<杨)?一诺/', trim($postObj->Content))){
            $toUser   = $postObj->FromUserName;
            $fromUser = $postObj->ToUserName;
            $arr = array(
                array(
                    'title'=>'一诺',
                    'description'=>"一诺的甜蜜屋",
                    'picUrl'=>'http://jinyifuqin.vip/uploads/VrOsIjP1MEz9SH.jpg',
                    'url'=>'http://jinyifuqin.vip/admin/user',
                ),
            );
            $template = "<xml>  
                        <ToUserName><![CDATA[%s]]></ToUserName>  
                        <FromUserName><![CDATA[%s]]></FromUserName>  
                        <CreateTime>%s</CreateTime>  
                        <MsgType><![CDATA[%s]]></MsgType>  
                        <ArticleCount>".count($arr)."</ArticleCount>  
                        <Articles>";
            foreach($arr as $k=>$v){
                $template .="<item>  
                            <Title><![CDATA[".$v['title']."]]></Title>   
                            <Description><![CDATA[".$v['description']."]]></Description>  
                            <PicUrl><![CDATA[".$v['picUrl']."]]></PicUrl>  
                            <Url><![CDATA[".$v['url']."]]></Url>  
                            </item>";
            }
            $template .="</Articles>  
                        </xml> ";
            echo sprintf($template, $toUser, $fromUser, time(), 'news');
        }else{
            switch( trim($postObj->Content) ){
                case '杨一诺':
                    $content = '我喜欢你';
                    break;
                case '李念':
                    $content = '我老婆';
                    break;
                case '李家荣':
                    $content = '小舅子';
                    break;
                case '李蓉':
                    $content = '大姐';
                    break;
                case '杨寅辉':
                    $content = '大帅哥';
                    break;
                case '书旅and良玉':
                    $content = 'Forever with you';
                    break;
                case '学弟':
                    $content = '书旅是你学长';
                    break;
                default:
                    $content = "<a href='http://www.baidu.com'>百度一下，你就知道(点击文字，进入百度)</a>";

            }
            $template1 = "<xml>  
                            <ToUserName><![CDATA[%s]]></ToUserName>  
                            <FromUserName><![CDATA[%s]]></FromUserName>  
                            <CreateTime>%s</CreateTime>  
                            <MsgType><![CDATA[%s]]></MsgType>  
                            <Content><![CDATA[%s]]></Content>  
                            </xml>";
            $fromUser = $postObj->ToUserName;//消息从哪里来
            $toUser   = $postObj->FromUserName;//发送给谁
            $time     = time();
            //$content  = '我喜欢你';
            $msgType  = 'text';
            $write = sprintf($template1, $toUser, $fromUser,$time, $msgType, $content);
            Log::info('yyy',array('content'=>$write));
            echo $write;

        }
    }
}