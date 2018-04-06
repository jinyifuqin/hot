<?php
/**
 * Created by PhpStorm.
 * User: jinyi
 * Date: 2018/4/6
 * Time: 17:06
 */

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;


class WeixinController extends Controller{

    public function check(){ //valid signature , option

        include "WxController.php";
    }


}