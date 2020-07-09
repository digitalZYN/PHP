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

<!--
The following HTML is what renders the form.  Since this
script is also the processing script for adding a task item to
the database, the action of the form is calling the same
script.  This is one of a few different ways that processing
data coming to the web server application from a client (the web browser).  This method is fairly safe as long as the data
coming from the web server is "sanitized", meaning we don't insert it into the database until we have cleaned it.
-->

<!--
The following code will display the lists that are stored in the
list table.  The list will be displayed as an HTML hyperlink with
the list id in the get string.  This will ensure that the id for
the list (which groups task list items) will be available when the task list item is inserted.
-->


<?php

//include 'connectdb.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tasklist";
/*
This is interesting, the HTML code will only display if the
there is an id on the get string of the URL
*/
if(filter_has_var(INPUT_GET,'id'))
{

    // Get the ID of the list, this was attached to the URL and
    // will come in when the URL is clicked on the list table --
    // The HTML table that has the list descriptions and was
    // rendered above.
    $list_id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    ?>
    <h2>Add a Task Item</h2>

    <form action="insert_and_display_task_items.php?id=<?php echo $list_id; ?>" method="post">
        Task Item Description: <input type="text" name="description"><br>
        Completed: <input type="text" name="completed" size="1"><br>
        <input type="submit">
    </form>

    <?php
    /* Make sure that we close the if statement*/
}
?>

<!--
The following PHP code is for processing the data coming from the form.
This code will also select all data from the list table of the tasklist
database and will display the data in a table.  The example code in this repository
display.php has some good ideas for how to display the code.  Put it after the
"filter and insert into the database" step
-->
<?php

// Create connection

/*
    1.  Check if there is data in the $_POST array
        We will be using the filter functions which
        do a pretty good job of filtering out potentially dangerous characters and possible attacks such as cross site scripting.
    2.  If there is data in the $_POST and/or $_GET array, clean it and  prepare the SQL statement

*/
// filter and insert data into the database if available
if(filter_has_var(INPUT_GET,'id'))
{

    //  process the form if there is data in it.
    if(filter_has_var(INPUT_POST,'description'))
    {   include_once 'connectdb.php';
        $conn =  connectdb($servername, $username, $password, $dbname);

        $description = filter_input(INPUT_POST,'description',FILTER_SANITIZE_SPECIAL_CHARS);
        $completed = filter_input(INPUT_POST,'completed',FILTER_SANITIZE_SPECIAL_CHARS);


        $sql = "INSERT INTO listitem (list_id,description,completed) VALUES ('$list_id','$description','$completed')";


        if ($conn->query($sql) === TRUE) {
            print "New list item record successfully created";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
}
?>
<!--
    @Student Code@
    Put the task item display code after this comment, this will display the items as a table.  This is very similar to the last assignment.
-->
<?php
    if(filter_has_var(INPUT_POST,'description')) {
        ?>
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

            $sql = "SELECT id, list_id,description FROM listitem";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $list_record = $conn->query("SELECT id, description FROM list WHERE id=" . $row['list_id']);
                    $row2 = $list_record->fetch_assoc();

                    //ORIGINAL
                    //echo "<tr><td>" . $row["id"] . "<td>" . $row2['description'] . "</td>" . "<td>" . $row["description"] . "<td></tr>";

                    //LIST ITEM
                    echo "<tr><td>" . $row['id'] . '</td><td>' . $row2['description'] . '</td><td><a href="update_display_task_items.php?item_id=' . $row["id"] .'">'. $row['description'] . "</a></td></tr>";

                    //LIST
                    //echo "<tr><td>" . $row['id'] . '</td><td><a href="?id=' . $row['id'] . '">' . $row['description']. "</a><td></tr>";
                }
            }
?>
        </table>
    <?php
    $conn->close();
    }
    ?>