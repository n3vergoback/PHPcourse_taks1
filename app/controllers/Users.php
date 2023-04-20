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
                'too_short_name' => '',
                'too_short_pw' => '',
                'email_exists' => '',
                'pw_dont_match' => ''
            ];

            if($this->userModel->findUserByEmail($data['email'])){
                $data['email_exists'] = 'Пользователь с такой почтой уже существует';
            }

            if(strlen($data['name']) < 2){
                $data['too_short_name'] = 'Имя должно быть не короче 2 символов!';
            }

            if(strlen($data['password']) < 8){
                $data['too_short_pw'] = 'Пароль должен быть не короче 8 символов!';
            }

            if($data['password'] != $data['password1']) {
                $data['pw_dont_match'] = 'Пароли не совпадают!';
            }

            if(empty($data['pw_dont_match']) && empty($data['email_exists']) && empty($data['too_short_pw']) && empty($data['too_short_name'])){
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
                'too_short_name'=>'',
                'too_short_pw'=>'',
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
            if(empty($data['email_exists'])) {
                $user = $this->userModel->userLogin($data['email'], $data['password']);
                if ($user) {
                    $this->createUserSession($user);
                } else {
                    $data['pw_match'] = 'Неверный пароль!';
                    $this->view('users/signin', $data);
                }
            } else {
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

    public function createUserSession(object $user): void{
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('pages/index');
    }

    public function logout():void{
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/signin');
    }
}