<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\Request;

class SiteController extends Controller
{
    public function home() {
        $params = [
            'name' => 'Milos',
            'last' => 'Glogovac'
        ];
        return $this->render('home', $params);
    }
    public function contact() {
        return $this->render('contact');
    }
    public function handleContact(Request $request) {
        echo '<pre>';
        var_dump($request->getBody());
        echo '</pre>';
        exit;
    }
}

