<?php
namespace app\index\controller;
use think\console\command\make\Model;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index2()
    {
        return 2;
    }

    public function hello()
    {

        /*$content = '{$name}-{$email}';*/
        return $this->fetch('hello2', [
            'name'  => 'ThinkPHP',
            'email' => 'thinkphp@qq.com'
        ]);

    }

    public function hello2()
    {
        return $this->fetch('hello', [
            'name'  => '5+664+6',
            'email' => 'asidads'
        ]);

    }

    public function a()
    {
        $list=Db::name('data')->where('id','>','0')->paginate(10,30);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function b()
    {
        Db::table('think_data')
            ->insert(['name'=>'wqeqwr','status'=>'3']);
    }

    public function c()
    {
        Db::execute('update think_data SET NAME ="awhqqw" where id=3');
    }

    public function add()
    {
        return $this->fetch();
    }

    public function add1()
    {
        /*return $this->fetch();*/
        $data['name']=$_POST['name'];
        $data['comment']=$_POST['comment'];

        if($data['comment']!="")
        {
            Db::table('think_data')
                ->insert($data);
            $this->success('提交成功','add');
        }
        else{
            $this->error('提交失败','add');
        }


    }

}
