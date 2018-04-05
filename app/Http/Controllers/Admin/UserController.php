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


class UserController extends Controller
{
  public function index()
    {
        return view('admin.index');
        //
    }
}