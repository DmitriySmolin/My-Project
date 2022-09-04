<?php

include_once __DIR__.'/../models/User.php';

class UserController extends CommonController
{
    public string $path_views = 'user';

   public function actionGet(){
    $user= User::findOne();

    return $this->renderFile('get',compact('user'));
   }

   public function actionList(){
    $users= User::findAll();

    return $this->renderFile('list',compact('users'));
   }
}
