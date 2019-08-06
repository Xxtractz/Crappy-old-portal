<?php
namespace App\Controllers;
use Core\Controller;
use Core\Helper;
use Core\Input;
use Core\Router;
use Core\SendMail;
use Core\Validate;
use App\Models\Users;

class RegisterController extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller,$action);
        $this->load_model('Users');
        $this->view->setLayout('default');
    }

    public function loginAction(){
        $validation = new Validate();
        if($_POST){
            // form validation

            $validation->check($_POST, [
                'username' => [
                    'display' => "Username",
                    'required' => true
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6
                ]
            ]);

            if($validation->passed()){
                $user = $this->UsersModel->findByUsername($_POST['username']);

                if($user && password_verify($_POST['password'], $user->password)){
                    $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;

                    Users::login($remember);
                    Router::redirect('');
                }elseif (!$user){
                    $validation->addError("There is an error with your username or password");
                }else{
                    $validation->addError("There is an error with your username or password");
                }
            }
        }

        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/login');
    }

    public function registerAction(){
        $validation = new Validate();

        if($_POST){
            Helper::posted_values($_POST);
            $validation->check($_POST, [
                'email'=> [
                    'display' => "E-mail",
                    'required' => true,
                    'unique' => 'users',
                    'max' => 150,
                    'valid_email' => true
                ],
                'idNo'=> [
                    'display' => "Identification Number",
                    'required' => true,
                    'min' => 13,
                    'unique' => 'users',
                    'max' => 13,
                    'is_numeric' => true
                ],
                'accNo'=> [
                    'display' => "Account Number",
                    'is_numeric' => true
                ]
            ]);


            if($validation->passed()){
                $newUser = new Users();
                $newUser->registerNewUser($_POST);
                Router::redirect('register/login');
            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/register');
    }

    public function confirmAction(){
        $user_id = $this->UsersModel->findByID($_GET['sub']);;

        if($user_id){
            $user_id->confirm($_GET['sub'], $_GET['code']);
            Router::redirect('register/login');
        }
        // else {
        //     $verify->verify($_POST['username']);
        // }
        $this->view->render('register/confirm');
    }

    public function forgotAction(){
        if($_POST){
            $reset= $this->UsersModel->findByEmail($_POST['email']);
            $newpassword = Helper::_getpassword();
            $update = [
                'password' => password_hash($newpassword, PASSWORD_DEFAULT) 
            ];
            $reset->reset($reset->id, $update);
            SendMail::reset($reset->email, $newpassword);
        }
        $this->view->render('register/forgot');
    }

    public function logoutAction(){
        if(currentUser()){
            currentUser()->logout();
        }
        Router::redirect('register/login');
    }
}