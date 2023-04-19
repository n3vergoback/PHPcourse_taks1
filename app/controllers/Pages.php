<?php
class Pages extends Controller {
    public function __construct(){

    }

    public function index(): void{
        $data = [

        ];
        $this->view('pages/index', $data);
    }

    public function feedback(): void{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name'=> $_POST['name'],
                'email'=> $_POST['email'],
                'source'=> $_POST['source'],
                'skills'=>$_POST['skills'],
                'message'=>$_POST['message'],
                'rate'=>$_POST['rate']
            ];

        } else {
            $data = [
                'name'=> '',
                'email'=> '',
                'source'=> '',
                'skills'=>'',
                'message'=>'',
                'rate'=>''
            ];
            $this->view('pages/feedback', $data);
        }
    }
}
