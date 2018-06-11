<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;

class Index extends Controller
{

    public static $token = ['user_id' => null, 'token' => null];

    public function index()
    {
        return $this->fetch('index', self::$token);
    }

    public function login()
    {
        return $this->fetch('login', self::$token);
    }

    public function xianshi()
    {
        return $this->fetch();
    }

    public function doRegister(){
        $input=input('post.');
        $data=[
            'phone'=>$input['phone'],
            'password'=>$input['password'],
            're_password'=>$input['re_password'],
            'referee_phone'=>$input['referee_phone']
        ];
        $type = 'post';
        $url = 'http://localhost/pcwxapi/public/index.php/user/register';
        $arr =  self::http_curl($data,$url,$type);
        $res=json_decode($arr,true);
        if($res['code']=='0'){
            return $this->redirect('index/index/login',['msg'=>'注册成功，请登录']);
        }else{
            return $this->redirect('index/index/register');
        }
    }

    public function doLogin()
    {
        $input = input('post.');
        $data = "phone={$input['phone']}&password={$input['password']}";
        $type = 'post';
        $url = 'http://localhost/pcwxapi/public/index.php/user/login';
        $arr = self::http_curl($data, $url, $type);
        $res = json_decode($arr, true);
        if ($res['code'] == '0') {
            Session::set('user_id', $res['data']['data']['user_id']);
            Session::set('token', $res['data']['token']);
            return $this->redirect('index/index/my');
        } else {
            return $this->redirect('index/index/login');
        }
    }

    public function hyr()
    {
        return $this->fetch();
    }

    public function shopitems()
    {
        $input=$this->request->param();
        $data['token'] = Session::get('token');
        $data['user_id'] = Session::get('user_id');

        $data['gid']=$input['goods_id'];
        if(!empty($input['seller_id'])){
            $data['sid']=$input['seller_id'];
        }else{
            $data['sid']=null;
        }


        $this->assign('data', $data);
        return $this->fetch();
    }

    public function shopcat()
    {
        $data['token'] = Session::get('token');
        $data['user_id'] = Session::get('user_id');

        $this->assign('data', $data);
        return $this->fetch();
    }

    public function order()
    {
        return $this->fetch();
    }

    public function myvip()
    {
        $data['token'] = Session::get('token');
        $data['user_id'] = Session::get('user_id');

        $this->assign('data', $data);
        return $this->fetch();
    }

    public function myfx()
    {
        $data['token'] = Session::get('token');
        $data['user_id'] = Session::get('user_id');

        $this->assign('data', $data);
        return $this->fetch();
    }

    public function my()
    {

        $data['token'] = Session::get('token');
        $data['user_id'] = Session::get('user_id');

        $this->assign('data', $data);
        return $this->fetch();

    }

    public function orderforgoods()
    {
        $data['token'] = Session::get('token');
        $data['user_id'] = Session::get('user_id');

        $this->assign('data', $data);
        return $this->fetch();
    }

    public function pay()
    {
        $input=$this->request->param();
        $data['token'] = Session::get('token');
        $data['user_id'] = Session::get('user_id');

        $data['order_account']=$input['order_account'];

        $this->assign('data', $data);
        return $this->fetch();
    }

    public function goods1()
    {
        return $this->fetch();
    }

    public function goods2()
    {
        $input=$this->request->param();
        $data=[];
        if(!empty($input['searchText'])){
            $data['searchText'] = $input['searchText'];
        }else{
            $data['searchText'] = null;
        }
        if(!empty($input['sortType'])){
            $data['sortType'] = $input['sortType'];
        }else{
            $data['sortType'] = null;
        }

        if(!empty($input['seller_id'])){
            $data['seller_id'] = $input['seller_id'];
        }else{
            $data['seller_id'] = '1111';
        }

        $this->assign('data', $data);
        return $this->fetch();
    }

    public function open()
    {
        return $this->fetch();
    }

    public function opening()
    {
        return $this->fetch();
    }


    public function http_curl($data, $url, $type)
    {

        if ($type == 'post') {
            //1.初始化curl
            $ch = curl_init();
            //2.设置curl的参数
            curl_setopt($ch, CURLOPT_URL, $url);//设置访问的url
            curl_setopt($ch, CURLOPT_HEADER, 0);//设置头文件的信息作为数据流输出
//            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
//            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //执行后不直接打印出
//            curl_setopt($ch,CURLOPT_HTTPHEADER,$host);
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);//设置访问的url
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //执行后不直接打印出
//            curl_setopt($ch,CURLOPT_HTTPHEADER,$host);
        }
        //3.采集
        $result = curl_exec($ch);//执行获取内容
        //4.关闭
        curl_close($ch);
        if ($result == NULL) {
            return 0;
        }
        return $result;
    }
}
