<!DOCTYPE HTML>
<html>
	<head>
		<h2>	
		Martine Hernandez<br>
		PHP
		</h2>
		<br>----------------------------------------------------------------------------<br>
		This project will be to take this data and display it in table form. <br>
		The following data is data that comes from a grading system (demo for this course, not actual data).<br>
		The keys that look like 001,002, and 003 are the id numbers for the students.  <br>
		The scores are stored in the array.  This is an associative array that has data<br>
		that is also an associative array.<br>
		----------------------------------------------------------------------------<br>
		<h1>Multi Dimensional Arrays</h1>
		<style>
			body {
			color: white;
			background-color: black;
			}
        
			.input {
				width: 100px;
				clear: both;
			}	
        
			.input input {
				width: 100%;
				clear: both;
			}
		</style>
	</head>
		<table style="auto" align = left>
			<tr>
				<th>ID</th>
				<th>Name</th> 
				<th>Scores</th>
			</tr>
			<?php		
			/* 
			1.
	
			Use the following for reference for  this assignment:

			https://www.w3schools.com/php/php_arrays.asp
			https://www.w3schools.com/php/php_arrays_sort.asp 

			For this project, you will use the sort and ksort functions to sort
			the following data from a grading program.

			This project will be to take this data and display it in table form.	
			The following data is data that comes from a grading system (demo for this course, not actual data).
			The keys that look like 001,002, and 003 are the id numbers for the students.  
			The scores are stored in the array.  This is an associative array that has data
			that is also an associative array.
	
			*/ 
			
			// the following function is a way to look at the data in an array,
			// look it up at http://php.net/manual/en/function.var-dump.php
			// comment it out for the final project that you will turn in.
			//var_dump($data);
			/*

			2.
			In the web page : https://www.w3schools.com/php/php_arrays_sort.asp
			There is a description of a function that will sort the associative array by
			its keys,  find that function and sort the $data array by the first key value
			iterate over the associative array by using the appropriate control structure
			Have a look at the foreach control structure.
		
			Look at https://secure.php.net/manual/en/control-structures.foreach.php
			The example on that page that you should that you should look at is: 
		
			foreach (array_expression as $key => $value)
				statement
        
			iterate over student records stored in the $data array and sort the scores array.
			Please note that the scores array is not an associative array.
  
			With the final sorted array, output an HTML table that has the following columns:
  
			Student Id    Name            Scores
			001           John Smith      73,75,85,90
			002           Josie Hacker    70,71,81,95
			003           Crazy Harry     70,72,84,91
  
  
			Read the following page https://www.w3schools.com/html/html_tables.asp
			for help with how to structure an HTML table.
  
  
			Use this page as the starting point for your project.  When completed accept
			the following assignment on github:
  
			https://classroom.github.com/a/xhrcy-le
  
  
			Put your php file in the assignment repository and upload your repository
			link on the assignment page that is provided.
  
			*/
			
				$data = [
					'003'   => ['Name'=>'Crazy Harry','Scores'=>[84,91,72,70]],
					'001'   => ['Name'=>"John Smith",'Scores'=>[90,85,75,73]],
					'002'   => ['Name'=>'Josie Hacker','Scores'=>[81,95,70,71]]
				];

				ksort($data);

				foreach ($data as $id => $students) {
					print "<tr>";
					print "<td>" . $id . "</td><td>" . $students['Name'] . "</td>";
					print "<td>";
					foreach ($students['Scores'] as $scoreList) {
						print $scoreList . " ";
					}
					print"<td>";
				}	
			?>
		</table>	
	</body>
</HTML>