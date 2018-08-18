<?php

namespace app\Common\model;

use think\Model;
use think\Db;

class Blog extends Base
{
    public function Add($data) {
        $validate = validate("BlogValidate");

        $result = array();

        if(!$validate->scene('add')->batch()->check($data)) {
            //dump($data);
            $result['msg'] = $validate->getError();
            $result['value'] = 0;
        }
        else {
           
            $result['msg'] = array();

            $data['createTime'] = date('Y-m-d H-i-s');
            $data['updateTime'] = date('Y-m-d H-i-s');
            $data['status'] = 'A';
            //$data['seqNum'] = 1;

            unset($data['tag']);
            
            $result['msg'] = array();
            $result['value'] = db('blog')->insert($data);
            
        }

        return $result;
    }
}