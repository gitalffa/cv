<?php

namespace App\Controllers;
use App\Models\User;
use Laminas\Diactoros\Response\RedirectResponse;


class AuthController extends BaseController{

    public function getLogin(){
        return $this->renderHTML('login.twig');

    }

    public function postLogin($request){
        //var_dump($request);
        $postData = $request->getParsedBody();
        $responseMessage = null;
        $user = User::Where('email',$postData['email'])->first();
        if($user){
            if(\password_verify($postData['password'],$user->password)){
                $_SESSION['userId'] = $user->id;
                return new RedirectResponse('/cv/admin');
            }else{
                $responseMessage = 'Bad credenntials';
            }
        }else{
            $responseMessage = 'Bad credenntials';
        }

        return $this->renderHTML('login.twig',[
            'responseMessage'=>$responseMessage
        ]);
    }

    public function getLogout(){
        unset($_SESSION['userId']);
        return new RedirectResponse('/cv/login');

    }
    public function getProtected(){
        unset($_SESSION['userId']);
        $responseMessage = 'Protected Route';
        return $this->renderHTML('login.twig',[
            'responseMessage'=>$responseMessage
        ]);

    }

}