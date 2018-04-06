<?php
namespace App\Http\Controllers;
use URL;
require __DIR__.'/../../libweibo-master/saetv2.ex.class.php';
require __DIR__.'/../../libweibo-master/config.php';

class HotController extends Controller{
    public function index(){
        $callback_url = "http://jinyifuqin.vip/admin/user";
        $callback_url = WB_CALLBACK_URL;
        $obj = new \SaeTOAuthV2(WB_AKEY, WB_SKEY);//$client_id就是App Key  $client_secret就是App Secret
        $weibo_login_url = $obj->getAuthorizeURL($callback_url);
        return view('index',['url'=>$weibo_login_url]);
    }

    public function login(){
        session_start();
        $o = new \SaeTOAuthV2( WB_AKEY , WB_SKEY );

        if (isset($_REQUEST['code'])) {
            $keys = array();
            $keys['code'] = $_REQUEST['code'];
            $keys['redirect_uri'] = WB_CALLBACK_URL;
            try {
                $token = $o->getAccessToken( 'code', $keys ) ;
            } catch (OAuthException $e) {
            }
        }

        if($token){
            $_SESSION['token'] = $token;

            setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );

            return redirect('weibolist');
        }else{
            return false;
        }
    }

    public function weibolist(){    //获取用户信息
        session_start();

        $c = new \SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
        $ms  = $c->home_timeline(); // done
        $uid_get = $c->get_uid();
        $uid = $uid_get['uid'];
        $user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
//        echo "<pre>";var_dump($user_message);exit;
        return view('weibolist',['usermsg'=>$user_message,'ms'=>$ms]);
    }
    

}

