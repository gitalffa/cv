<?php

namespace App\Controllers;


use App\Models\User;
use Respect\Validation\Validator as v;

class UsersController extends BaseController{
    public function getAddUserAction($request){
        $responseMessage = null;
       
         if($request->getMethod() == 'POST'){
            $postData = $request->getParsedBody();
            $userValidator = v::key('email', v::email()->notEmpty())
                  ->key('password', v::stringType()->notEmpty());
            try{
                $userValidator->assert($postData);
                $postData = $request->getParsedBody();

                
                $user = new User();
                $user->email =$_POST['email'];
                $user->password =password_hash($_POST['password'],PASSWORD_DEFAULT);
                
                $user->save();

                $responseMessage='Saved';
            }catch (\Exception $e){
                $responseMessage = $e->getMessage();
            }

        } 
        
        return $this->renderHTML('addUser.twig',[
            'responseMessage' => $responseMessage
        ]);
        //include '../views/addJob.php';
    }
}