<?php
class Users extends Controller {
    protected object $userModel;
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function signUp(): void{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'password1' => $_POST['password1'],
                'email_exists' => '',
                'pw_dont_match' => ''
            ];

            if($this->userModel->findUserByEmail($data['email'])){
                $data['email_exists'] = 'Пользователь с такой почтой уже существует';
            }

            if($data['password'] != $data['password1']) {
                $data['pw_dont_match'] = 'Пароли не совпадают!';
            }

            if(empty($data['pw_dont_match']) && empty($data['email_exists'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->userRegister($data)){
                    redirect('users/signin');
                } else {
                    die('Что-то пошло не так...');
                }
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

    public function signIn(): void{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'email'=>$_POST['email'],
                'password'=>$_POST['password'],
                'email_exists'=>'',
                'pw_match'=>''
            ];

            if(!$this->userModel->findUserByEmail($data['email'])){
                $data['email_exists'] = 'Пользователь с такой почтой не найден!';
            }

            if($this->userModel->userLogin($data['email'], $data['password'])){
                die('logged in');
            } else {
                $data['pw_match'] = 'Неверный пароль!';
                $this->view('users/signin', $data);
            }
        } else {
            $data = [
                'email'=>'',
                'password'=>'',
                'email_exists'=>'',
                'pw_match'=>''
            ];
            $this->view('users/signin', $data);
        }
    }
}