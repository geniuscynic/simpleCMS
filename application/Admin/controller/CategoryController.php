<?php
namespace app\admin\controller;

use app\Common\controller\BaseController;
use app\Common\Entity\Message;


class CategoryController extends BaseController
{
   
    public function Add() {

        $input = input('post.');
        if(count($input) > 0) {
            $form = array(
                'name' => $input['categoryName'],
                'parentId' => $input['parentCategoryId'],
                'level' => $input['level'] + 1
             );

             $result = model("category")->Add($form);
             $this->show();
             $this->setMessage($result);
            //$this->redirect('admin/category/add');
            
        }

        $result = model("category")->GetCategory();
        $this->assign('category', json_encode($result));

        return $this->fetch();
    }

    public function List() {
        return $this->fetch();
    }

    protected function show() {
        
        $result = model("category")->GetCategory();

        //dump(json_encode($result));
        $this->assign('category', json_encode($result));
   }

}
