<?php
class Pages extends Controller {
    protected object $feedbackModel;
    public function __construct(){
        $this->feedbackModel =$this->model('Feedback');
    }

    public function index(): void{
        $data = [

        ];
        $this->view('pages/index', $data);
    }

    public function feedback(): void{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name'=> $_SESSION['user_name'],
                'email'=> $_SESSION['user_email'],
                'source'=> $_POST['source'],
                'skills' => array_sum(
                    array(
                        isset($_POST['php']) ? 1 : 0,
                        isset($_POST['mysql']) ? 2 : 0,
                        isset($_POST['js']) ? 4 : 0,
                        isset($_POST['git']) ? 8 : 0
                    )
                ),
                'message'=>$_POST['message'],
                'rate'=>$_POST['rate']
            ];

            if($this->feedbackModel->addFeedback($data)){
                redirect('/pages/index');
            }

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
