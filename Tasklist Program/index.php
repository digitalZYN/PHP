<!DOCTYPE HTML>
<html>
	<head>
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
	</head>
	
	<div>
	<body>

			<div>
				<form name="newTask" method="post">
					<label>
						Task Name:<input type="text" name="taskName" required="required">
					</label>
					<label>
						Task Description:<br><textarea name="taskDescription" cols="60" rows="5" required="required"></textarea>
					</label>
					<input type="submit" name="newTaskSubmit" value="New Task" >
				</form>
			</div>
		
	<!--
		Develop  Task and Tasklist classes to serve as the foundation a task list manager application.
		Develop a Task class which has the following private properties
			$description
			$completed
			$date_created
			$date_completed
		Create setter and getter methods for all of the properties of the Task class.
		Develop a Tasklist class which will have the following properties:
		an array to store tasks
		a method called addTask which takes a task as a parameter and adds it to the list
		a method called printTasks which will iterate through the list and print out each task.  
		The task printed will be the description, whether completed or not and the date completed if it is completed.
		When completed with this assignment, accept this github invitation  https://classroom.github.com/a/CrGQd5au.  
		Share the  the link to the repository in the submission box provided on the assignment page.
	-->

	<?php

        class TaskList
        {
            private $Tasks = array();

            public function addTasks($aTask)
            {
                array_push($this->Tasks, $aTask);
            }

            public function printTasks()
            {
                foreach($this->Tasks as $ListofTasks)
                {
                    print
                    "
                        <table style=\"width:100%\" align=\"left\">
				        <tr><th>Completed:</th><th>Task Name:</th> <th>Description:</th> <th>Date Created:</th> <th>Date Completed:</th></tr>				    
				        <tr><td><button onclick={$ListofTasks->setCompleted()}>Done</button></td><td>{$ListofTasks->getTask()}</td>
				        <td><p>{$ListofTasks->getDescription()} </p></td> <td>{$ListofTasks->getCreated()}</td> 
				        <td>{$ListofTasks->getCompleted()}</td></tr></table>
				     ";
                }
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
                if (isset($_POST['taskName']) && isset($_POST['taskDescription'])) {
                    $this->task = $_POST['taskName'];
                    $this->description = $_POST['taskDescription'];
                    $this->date_created = date("m.d.y");
                    $this->completed = false;
                    $this->date_completed = "00.00.0000";
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

        if (isset($_POST['taskName']) && isset($_POST['taskDescription']))
        {
            $Atask = new Task();
            $Taskslist->addTasks($Atask);
        }

		$Taskslist->printTasks();
	
	?>
</HTML>