<?php
    if (isset($_SESSION['id'])) {
?>

<div class="list">
    <form class="item-add" action="index.php" method="post">
        <input type="text" name="task" placeholder="New Task" class="input"> 
        <input type="text" name="comments" placeholder="Add comment" class="input" id="comment">
        <input type="date" name="due" id="today" class="input due" >
        <button type="submit" name="addBtn" class="submit">Add</button>
    </form>
</div>

<?php
}
?>
