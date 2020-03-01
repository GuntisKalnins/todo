<?php
class Controller {

    private $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    private function getReq(){ 

        if (basename($_SERVER['PHP_SELF']) === 'register.php') {
            $this->model->getRegister();
            return;
        }
        $this->model->getTasks();        
    }

    private function postReq(){

        if (basename($_SERVER['PHP_SELF']) === 'register.php') {
            $this->model->addNewUser();
            return;
        }
        if (isset($_POST['addBtn'])) {
            $this->model->addTasks(); 
        } elseif (isset($_POST['delForm'])) {
            $this->model->deleteTasks();        
        } elseif (isset($_POST['updateBtn'])) {
            $this->model->updateTasks();   
        } else {
            header('location: /error.php');
        }
    }
    
    public function route(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->getReq();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postReq();
        }
    }
}