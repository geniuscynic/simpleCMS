<?php
namespace app\admin\controller;

use app\Common\controller\BaseController;

class BlogController extends BaseController
{
   
    public function Add() {

        $input = input('post.');
        if(count($input) > 0) {
            $form = array(
                'title' => $input['title'],
                'content' => $input['content'],
                'categoryId' => $input['categoryId'],
                'tag' => $input['tag'],
             );

             $result = model("blog")->Add($form);

            if(count($result['msg']) > 0) {
                dump($result);
            }
            else {
                //session('user', $result['value']);

                //$this->redirect(url('/admin/home'));
                $result['msg'][0] = "添加成功";
               // dump($result);
            } 
        }

        return $this->fetch();
    }


    public function show() {
        $category = model('category')->GetCategory();
        $this->assign('category', $category);
        
    }
}
