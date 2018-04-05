<?php
/**
 * Created by PhpStorm.
 * User: jinyi
 * Date: 2018/4/5
 * Time: 9:46
 */

namespace App\Http\Controllers\Admin;
use App\Pic;
use App\Newuser;
use Exception;
use Mail;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller; //add
use App\Jobs\SendReminderEmail;
use DB;
use memcache;
use Cache;


class UsersController extends Controller
{
    public function index(){
        return view('admin.index');
        //
    }

    public function register(){
        return view('admin.register');
    }

    public function save(Request $req)
    {   //
//        $id = DB::table('users')->insertGetId(
//            ['email' => 'john@example.com', 'votes' => 0]);
        $obj = new Newuser();
        $obj->username = $req['username'];
        $obj->email = $req['email'];
        $obj->password = $req['psw'];
        $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $newStr = '';
        for($i=0;$i<14;$i++){
            $num = mt_rand(0,strlen($str)-1);
            $newStr .= substr($str,$num,1);
        }
        $newStr = $newStr.'.jpg';
        if($req->file('picname'))
            $req->file('picname')->move(public_path('uploads'),$newStr);
        $obj->headpic = $newStr;


        $re = $obj->save();

        if($re){
            return view('/admin/wait')->with(
                [
                    'message'=>'你已经注册成功，请等待！',
                    'url' =>'/admin/user',
                    'jumpTime'=>8,
                ]
            );
        }else{
            return false;
        }
    }

}