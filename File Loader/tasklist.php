<!DOCTYPE HTML>
<html>
<title>Task LIst</title>
<br>---------------------------------------------------<br>
Martine Hernandez<br>
PHP<br>
Task List<br>
A task list program<br>
---------------------------------------------------<br>
<h1>Task List</h1>
<style>
    body {
        color: white;
        background-color: black;
    }

    .input {
        width: 200px;
        clear: both;
    }

    .input input {
        width: 100%;
        clear: both;
    }

    label, input {
        display: block;
    }

    label {
        margin-bottom: 20px;
    }

    table,th, td {
        padding: 5px;
        border-spacing: 15px;
        text-align: left;
    }
</style>

	<!--
        A task list program that writes to file csv
	-->

	<?php

        class TaskList
        {
            private $txt = array();

            public function addTasks($aTask)
            {
            	$myfile = fopen("tasks.csv", "a") or die("Unable to open file!");
				array_push($this->txt,"{$aTask->getTask()}","{$aTask->getDescription()}",
                    "{$aTask->getCreated()}", "{$aTask->getCompleted()}");
				fputcsv($myfile, $this->txt,',');
                fclose($myfile);
            }

            public function printTasks($aTask)
            {						 
				$row = 1;
				if (($handle = fopen("tasks.csv", "r")) !== FALSE)
				{
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                    {
						$num = count($data);
						$row++;

                        for ($c=0; $c < $num; $c++)
                        {
                            if ($c == 0 && $data[$c] != '')
                            {
                                print "<table><tr><th>Task Name:</th><th>Task Description:</th><th>Date Created:</th>
                                    <th>Date Completed:</th>";
                                print "<tr><td>$data[$c]</td>";
                            } else if ($c == 1)
                            {
                                print "<td>$data[$c]</td>";
                            } else if ($c == 2)
                            {
                                print "<td>$data[$c]</td>";
                            } else if ($c == 3)
                            {
                                print
                                    "
                                        <form name=\"taskDone\" action=\"tasklist.php\" method=\"post\">
                                            <td>$data[$c]</td>
                                            <td><input type='checkbox' id='done'></td></tr>
                                        </form>
                                    ";
                            }
                        }
                        print"</table>";
					}
				}
				fclose($handle);
			}
        }

		class Task
        {
			private $task;
			private $description;
			private $completed; //This variable will be used to determine if a task is completed
			private $date_created;
			private $date_completed;
			private $newDescription; //This variable will be used when we want to edit a description
			
			function __construct() //The constructor inserts the name, description and date created
            {
                if (!empty($_POST['taskName']) && !empty($_POST['taskDescription']))
                {
                    $this->task = $_POST['taskName'];
                    $this->description = $_POST['taskDescription'];
                    $this->date_created = date("m.d.y");
                    if(isset($_POST['done']))
                    {
                        $this->setCompleted();
                    } else
                    {
                        $this->completed = false;
                        $this->date_completed = "00.00.0000";
                    }
                }
            }
			
			public function getTask() //Returns the name of the task
            {
				return $this->task;
			}
			
			public function setDescription() //Sets the description of the task if edited
            {
				$this->description = newDescription;
			}
			
			public function getDescription() //Returns the description of the task
            {
				return $this->description;
			}
			
			public function getCreated() //Returns the date created
            {
				return $this->date_created;
			}
			public function setCompleted()  //Sets the date when completed
            {
                    $this->completed = true;
                    $this->date_completed = date("m.d.y");
			}
				
			public function getCompleted() //Returns completed date when called
            {
				return $this->date_completed;
			}
		}

        $Taskslist = new TaskList();

        if (!empty($_POST['taskName']) && !empty($_POST['taskDescription']))
        {
            $Atask = new Task();
            $Taskslist->addTasks($Atask);
            $Taskslist->printTasks($Atask);
        }
	?>
    <form name="newTask" action="index.html" method="post"><br><br>
        <input type="submit" name="newTaskSubmit" value="New Task">
    </form>
</HTML>