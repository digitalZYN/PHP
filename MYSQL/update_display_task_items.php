<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<?php
/**
File: update_display_task_items.php
When updating a record, it is very important to pay attention
to the order of operations.  If one is updating a record, the order
is to select the record from the database, fill the form.  When the user
clicks the submit button, then the $_POST array is checked.  The sql
string is built from the $_POST array and the sql is submitted.
Please NOTE!!!
This is only an example.  Production code would probably be a little more
involved than this example.
 */
include_once "connectdb.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tasklist";
// Create connection
$conn =  connectdb($servername, $username, $password, $dbname);
// This checks if a specific task item with the id on the get string is being requested
// This will depend on the URL and the GET string For instance to update
// the record with id = 1, the URL looks like
// http://localhost/update_display_task_items.php?id=1
if(filter_has_var(INPUT_GET,'id'))
{
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    if(filter_has_var(INPUT_POST,'submit')) // this means that the update button was clicked
    {
        $description = filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING);
        $completed = filter_input(INPUT_POST,'completed',FILTER_SANITIZE_STRING);
        $sql = "UPDATE listitem SET description='".$description."',completed='".$completed."' WHERE id=".$id;
        $result = $conn->query($sql);
        echo "Successfully updated the task item<br>";
        header('Location: index.php');
        exit;
    }
}
?>

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
include_once "connectdb.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tasklist";
$conn =  connectdb($servername, $username, $password, $dbname);

if(filter_has_var(INPUT_GET,'item_id')) {
    $id = filter_input(INPUT_GET,'item_id',FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT id,list_id,description,completed FROM listitem";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        ?>
        <h2>Update a Task Item</h2>

        <form action="update_display_task_items.php?id=<?php echo $id; ?>" method="post">
            Task Item Description: <input type="text" name="description" value="<?php echo $data['description'];?>"><br>
            Completed: <input type="text" name="completed" value="<?php echo $data['completed'];?>" size="1"><br>
            <input type="submit" name="submit" value="Update">
        </form>

        <h2>List Items Table</h2>

        <table>
            <tr>
                <th>Id</th>
                <th>List</th>
                <th>Description</th>
            </tr>
            <?php
            // Create connection
            $conn = connectdb($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM listitem";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $list_record = $conn->query("SELECT id, description FROM list WHERE id=" . $row['list_id']);
                    $row2 = $list_record->fetch_assoc();

                    if($_GET['item_id'] == $row["id"]) {
                    //ORIGINAL
                    echo "<tr><td>" . $row["id"] . "<td>" . $row2['description'] . "</td>" . "<td>" . $row["description"] . "<td></tr>";
                    }
                }
            }
            ?>
        </table>


        <?php
    }
    else {
        echo "No record found for id=".$id."<br>";
    }
}
?>
<!--
    @Student Code@
    Put the list display code after this comment, this will display the list as a table.
-->

<?php
$conn->close();
?>