<?php
class Model
{
    private $conn = null;
    private $view;

    public function __construct($config,View $view){

        $this->view = $view;
        $server = $config['server'];
        $db = $config['db'];
        $user = $config['user'];
        $pw = $config['pw'];
        $this->conn = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pw);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getTasks(){
        $userid = 0;
        if (isset($_SESSION['id'])) {
           // header('location: /error_wrong.php');                
            $userid = $_SESSION['id'];
        }
        $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE (user_id = :uid)");
        $stmt->bindParam(':uid', $userid);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $allRows = $stmt->fetchAll();
        $this->view->printTasks($allRows);
    }

    public function addTasks()
    {
        if (!isset($_SESSION['id'])) {
            header('location: /index.php');
        }
        $stmt = $this->conn->prepare("INSERT INTO tasks (task, comments, user_id) 
        VALUES (:task, :comments, :userid)");
        $stmt->bindParam(':task', $_POST['task']);
        $stmt->bindParam(':comments', $_POST['comments']);
        $stmt->bindParam(':userid', $_SESSION['id']);
        $stmt->execute();
        $this->getTasks();
        header('location: /index.php');
    }

    public function deleteTasks(){

        $stmt = $this->conn->prepare("DELETE FROM tasks WHERE id = (:taskid)");
        $stmt->bindParam(':taskid', $_POST['delForm']);
        $stmt->execute();
        $this->getTasks(); 
    }

    public function updateTasks(){

        $stmt = $this->conn->prepare("UPDATE tasks SET task = (:taskinfo), comments = (:comments)
        WHERE id = (:taskid)");
        $stmt->bindParam(':taskinfo', $_POST['task']);
        $stmt->bindParam(':comments', $_POST['comments']);
        $stmt->bindParam(':taskid', $_POST['updateBtn']);
        $stmt->execute();
        $this->getTasks();
    }

    public function getRegister()
    {
        $this->view->printRegister();
    }

    public function getId($user)
    {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE (name = :name)");
        $stmt->bindParam(':name', $user);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            return $result[0]['id'];
        } else {
            return 0;
        }
    }

    public function getHash($user)
    {
        $stmt = $this->conn->prepare("SELECT hash FROM users WHERE (name = :name)");
        $stmt->bindParam(':name', $user);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            header('location: /error_wrong.php');
            return $result[0]['hash'];
        } else {
            return 0;
        }
    }

    public function addNewUser() {

        if ($this->getHash($_POST['user']) != 0) {
            header('Location: /index.php');
            exit();
        }

        $stmt = $this->conn->prepare("SELECT name FROM users WHERE (name = :name) OR (email = :email)");
        $stmt->bindParam(':name', $_POST['user']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (count($result) > 0) {;
            header('location: /error.php');
        }

        if ($_POST['pw1']!= $_POST['pw2']){

        echo("Oops! Password did not match! Try again. ");

        }else{
            $stmt = $this->conn->prepare("INSERT INTO users (name, email, hash, created) 
            VALUES ( :name, :email, :hash, current_timestamp())");
            $stmt->bindParam(':name', $_POST['user']);
            $stmt->bindParam(':email', $_POST['email']);
            $hash = password_hash($_POST['pw1'], PASSWORD_DEFAULT);
            $stmt->bindParam(':hash', $hash);
            $stmt->execute();
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['id'] = $this->getId($_POST['user']);
    
            $this->getTasks();
        }
        


    }
}