<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
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
        $list=Db::name('data')->where('id','>','0')->paginate(10);
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
        /*$request = Request::instance();
        echo '请求方法：' . $request->method() . '<br/>';
        echo '资源类型：' . $request->type() . '<br/>';
        echo '访问ip地址：' . $request->ip() . '<br/>';
        echo '是否AJax请求：' . var_export($request->isAjax(), true) . '<br/>';
        echo '请求参数：';
        dump($request->post());
        echo Request::instance()->post('name');
        echo "<br/>";
        echo input('post.content');*/
        /*$data['name']=input('post.name');
        echo "POST传name值是：".$data['name'];
        echo "<br>";
        $data['content']=input('post.content');
        echo "POST传content值是：".$data['content'];*/


        return $this->fetch();
    }

    public function add1()
    {
        /*return $this->fetch();*/
        $data['name']=input('post.name');
        $data['content']=input('post.content');

        if($data['content']!="")
        {
            Db::table('think_data')
                ->insert($data);
            $this->success('提交成功','a');
        }
        else{
            $this->error('提交失败','add');
        }


    }

    public function update()
    {

    }

    public function delete()
    {

    }

}
