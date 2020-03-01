<?php
    if (isset($_SESSION['id'])) {
?>

<div class="list" id="list">
    <form class="item-add" action="index.php" method="post">
        <label for='task'>Task:</label>
        <input type="text" name="task" placeholder="New Task" class="input"> 
        <input type="text" name="comments" placeholder="Add comment" class="input" id="comment">
        <label for="due">Due date:</label>
        <input type="date" name="due" id="today" class="input due" >
        <button type="submit" name="addBtn" class="submit">Add</button>
    </form>
</div>

<?php
}
?>
