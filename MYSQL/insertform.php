<!DOCTYPE html>
<html>
<body>

<h2>Add a List Item</h2>

<form action="insertitem_from_form.php" method="post">
List Id: <input type="text" name="list_id" size="1" value="<?php filter_var($_GET['list_id'],FILTER_SANITIZE_INTEGER);?>">
Task Description: <input type="text" name="description">
Completed: <input type="text" name="completed" value="N" size="1">
<br><br>
<input type="submit">
</form>

</body>
</html>
