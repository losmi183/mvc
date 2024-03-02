<?php 

namespace app\controllers;
use app\core\Request;
use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller {
    
    public function login(Request $request)
    {
        if($request->isPost()){
            return 'Login post';
        }
        $this->setLayout('auth');
        return $this->render("login");
    }
    public function register(Request $request)
    {
        $registerModel = new RegisterModel();

        if($request->isPost()){
            $data = $request->getBody();
            $registerModel->loadData($data);

            if($registerModel->validate() && $registerModel->register()){
                // return 'Success';
            } 
            // echo '<pre>';
            // var_dump($registerModel->errors);
            // echo '</pre>';
            // exit;


            return $this->render("register", [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render("register", [
            'model' => $registerModel
        ]);
    }

}