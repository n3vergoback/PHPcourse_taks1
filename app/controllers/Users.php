<?php
class Users extends Controller {
    protected object $userModel;
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function signUp(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['name'],
                'password1' => $_POST['name'],
                'email_exists' => '',
                'pw_dont_match' => ''
            ];

            if($this->userModel->isUniqueUser($data['email'])){
                $data['email_exists'] = 'Пользователь с такой почтой уже существует';
            }

            if($data['password'] != $data['password1']) {
                $data['pw_dont_match'] = 'Пароли не совпадают!';
            }

            if(empty($data['pw_dont_match'] && $data['email_exists'])) {
                die('success');
            } else {
                $this->view('users/signup', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'password1' => '',
                'email_exists'=>'',
                'pw_dont_match' => ''
            ];
            $this->view('users/signup', $data);
        }
    }

    public function signIn(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [

            ];
        } else {
            $data = [

            ];
            $this->view('users/signin', $data);
        }
    }
}