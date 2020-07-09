<?php
/**
File: delete_taskitem.php
When deleting a record, it is very important to pay attention
to the order of operations.  If one is deleting a record, the order
is to confirm that the user wants to delete the record.
When the user clicks the submit button, then the $_POST array is checked.  The sql string is built based on the id and the sql is submitted.
 */
include_once "connectdb.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tasklist";
// Create connection
$conn =  connectdb($servername, $username, $password, $dbname);
// This checks if a specific task item with the id on the get string is being requested
if(filter_has_var(INPUT_GET,'id'))
{
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    if(filter_has_var(INPUT_POST,'submit')) // this means that the delete button was clicked
    {
        $sql = "DELETE FROM listitem WHERE id=".$id;
        $result = $conn->query($sql);
        if($result)
        {
            echo "Successfully deleted the task item<br>";
        }
    }
}
?>

<h2>Delete a Task Item</h2>
<!--
The following HTML is what renders the form.  Since this
script is also the processing script for adding a task item to
the database, the action of the form is calling the same
script.  This is one of a few different ways that processing
data coming to the web server application from a client (the web browser).  This method is fairly safe as long as the data
coming from the web server is "sanitized", meaning we don't insert it into the database until we have cleaned it.
-->
<?php
// Get the ID of the list, this was in the URL
// For instance, the URL looks like
// http://localhost/update_display_task_items.php?id=1
// The id will be available in $_GET when the URL is clicked
// on the HTML table rendered above --
// the filter_input function will assure that the only thing
// coming from the get string with id is an integer
if(filter_has_var(INPUT_GET,'id'))
{
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT id,list_id,description,completed FROM listitem";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    }
    ?>
    <form action="delete_taskitem.php?id=<?php echo $id; ?>" method="post">
        Are you sure that you want to delete the item?
        <input type="submit" name="submit" value="Yes">
        <input type="submit" name="submit" value="No">
    </form>

    <?php
}
?>
<!--
    @Student Code@
    Put the task item display code after this comment, this will display the items as a table.  This is very similar to the last assignment.
-->

<?php
$conn->close();
?>