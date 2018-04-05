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
//        echo "<pre>";var_dump($req);exit;
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

    public function login(Request $req,$page=1){
//        echo "<pre>";var_dump($page);exit;
        if (Cache::get('user')){

        }else{
            $username = $req['username'];
            $psw = $req['psw'];
            $obj = new Newuser();
            $re = $obj->where(['username'=>$username,'password'=>$psw])->first();
            Cache::put('user',$re,100);
        }
        $memRe = Cache::get('user');

        if($memRe || count($re)){
            $data = DB::table('pics')->paginate(5);

            return view('/admin/pic',['data'=>$data,'re'=>$memRe]);
        }else{
            return redirect('/admin/user');
        }
    }

    public function editshow(){
        return view('admin.editshow');
    }

    public function picsave(Request $request){
        $obj = new Pic();
        $obj->title = $request->title;
        $obj->content = $_POST['content'];

        $res = Pic::where('title',$obj->title)->get();
        if(count($res))
            return redirect('admin/pic');

        $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $newStr = '';
        for($i=0;$i<14;$i++){
            $num = mt_rand(0,strlen($str)-1);
            $newStr .= substr($str,$num,1);
        }
        $newStr = $newStr.'.jpg';
        if($request->file('picname'))
            $request->file('picname')->move(public_path('uploads'),$newStr);
        $obj->pathname = $newStr;
        $re = $obj->save();
        $memRe = Cache::get('user');
        if($re){//
            $data = Pic::paginate(5);
            $data->setPath('pic');
            return view('admin.pic',['data'=>$data,'re'=>$memRe]);
        }
    }

    public function piclist()
    {
        $memRe = Cache::get('user');
//        dd($memRe);exit;
        $data = DB::table('pics')->paginate(5);
        return view("admin.pic",['data'=>$data,'re'=>$memRe]);
    }

}