<?php
class View {
    
    public function printTasks($tasks){

        require_once "../src/template/head.php";
        require_once "../src/template/header.php";
        require_once "../src/template/add_new_tasks.php";

        echo "<div class='list-cont'>";
        foreach ($tasks as $index => $row) {

            echo "<div class='items'>"; 

            //delete form
            $rowid = $row['id'];
            echo "<form action='index.php' method='post'>";            
            echo "<input type='hidden' name='delForm' value='$rowid'>";
            echo "<button type='submit' class='submit' name='delBtn' value='$rowid' id='del-$rowid'>Delete</button>";
            echo "</form>";

            //update form
            echo "<form action='index.php' method='post'>";
            echo "<button type='submit' class='submit' name='updateBtn' value='$rowid'>Update</button>";
            foreach ($row as $colname => $cell) {
                switch ($colname) {
                    case "id":
                        //---
                        break;
                    case "task":
                        echo "<input class='item' type='text' name='task' value='$cell'></input>";
                        break;
                    case "comments":
                        echo "<input class='item' type='text' name='comments' value='$cell'></input>";
                        break;
                    case "created":
                        //---
                        break;
                    case "user_id":
                        //---
                        break;                        
                    default:
                        echo "<span class='task-cell'>$cell</span>";
                        break;
                }
            }
            echo "</form>";    
            echo "</div>";
        }
        echo "</div>";
        require_once "../src/template/footer.php";
    }
    public function printRegister(){
        require_once "../src/template/head.php";
        require_once "../src/template/header.php";
        require_once "../src/template/register_form.php";
        require_once "../src/template/footer.php";
    }
}
