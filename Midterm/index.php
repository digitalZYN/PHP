<!DOCTYPE HTML>
<html>
	<head>
		<br>----------------------------------------------------------------------------<br>
		Martine Hernandez<br>
		PHP<br>
		Midterm<br>
		Fill $questions with answers.<br>
		Prompt users for answers for questions<br>
		Print correct answers.<br>
		----------------------------------------------------------------------------<br>
		<h1>Midterm</h1>
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

	<form action = "index.php" method = "POST" name = 'q'>
	
	<?php

	/****************************************** Midterm *************************************************************
	* Part 1:
	*     In the $questions array shown below, add the correct answer for the remaining questions, the first one
	*     is done for you.  (you can earn extra credit by adding 2 of your own questions that are specific to PHP.)
	*
	* Part 2:
	*      Using this file, create a program which will ask the user for a key in the questions array (eg. q1)
	*      You will need to display a form which will have a text box asking for this value.  When the user
	*      submits the form (with a submit button) the program will detect if the post array has a value in it,
	*      (check out https://goo.gl/txyQby for a review of how to do this using isset) -- this program is similar to
	*      the example car look up program in the slides.
	*     
	*     When the user of the program (from a web browser) types in the key the following procressing will occur:
	*
	*      If the question value is set, then the program should access it from the $questions array and display 
	*      the question using
	*      echo.  Your program should display proper HTML to display the question,for example if q1 was submitted, then
	*      the program will send the following HTML (using echo):
	*
	*      <dl>
	*          <dt>What does PHP stand for?</dt>
	*          <dd>
	*              <ol type="a">
                        <li>PHP: Hypertext Preprocessor </li>
                        <li>Private Home Page </li>
                        <li>Personal Hypertext Processor</li>
                </ol>
                <br>
                Answer: a
	*
	*          </dd>
	*      </dl>
	*
	*      You should develop the program on your local computer.  The file name should be called index.php.  
	*      When you are completed with this midterm, then copy your file to this file on github and commit the repository.
	*      Upload the github link on the midterm assignment page where you are done.
	*
	*
	*/
 
		$questions = [

		'q1' => [
           'text' => 'What does PHP stand for?', 
				'choices' => [
					'a'=>'PHP: Hypertext Preprocessor',
					'b'=>'Private Home Page',
					'c' => 'Personal Hypertext Processor'
				],
			'correct' => 'a'
        ],
    
		'q2' => [
           'text' => ' PHP server scripts are surrounded by delimiters, which?', 
				'choices' => [
					'a' => '<?php>...</?>', 
					'b' => '<script>...</script>',
					'c' => '<?php...?>',
					'd' => '<&>...</&>'
				],
			'correct' => 'c'
        ],
    
		'q3' => [
           'text' => 'How do you write "Hello World" in PHP?', 
				'choices' => [
					'a'=>'echo "Hello World";',
					'b'=>'"Hello World";',
					'c' => 'Document.Write("Hello World");'
				],
			'correct' => 'a'
        ],


		'q4' => [
           'text' => 'All variables in PHP start with which symbol?', 
				'choices' => [
					'a'=>'!',
					'b'=>'$',
					'c' => '@'
				],
			'correct' => 'b'
        ],

		'q5' => [
           'text' => 'What is the correct way to end a PHP statement?',
				'choices' => [
					'a'=>'New line',
					'b'=>'.',
					'c' => ';',
					'd' => '</php>'
				],
			'correct' => 'c'
        ],
		
		'q6' => [
           'text' => 'The PHP syntax is most similar to:',
				'choices' => [
					'a'=>'JavaScript',
					'b'=>'VBScript',
					'c' => 'Perl and C'
				],
			'correct' => 'c'
        ],
		
		'q7' => [
           'text' => 'How do you get information from a form that is submitted using the "get" method?',
				'choices' => [
					'a'=>'$_GET[]',
					'b'=>'Request.Form',
					'c' => 'Request.QueryString'
				],
			'correct' => 'a'
        ],

		'q8' => [
           'text' => 'When using the POST method, variables are displayed in the URL:',
				'choices' => [
					'a'=>'True',
					'b'=>'False'
				],
			'correct' => 'b'
        ],

		'q9' => [
           'text' => 'In PHP you can use both single quotes ( \' \' ) and double quotes ( \" \" ) for strings:',
				'choices' => [
					'a'=>'True',
					'b'=>'False'
				],
			'correct' => 'a'
        ],
		
		'q10' => [
           'text' => 'What is the correct way to create a function in PHP?',
				'choices' => [
					'a'=>'new_function myFunction()',
					'b'=>'function myFunction()',
					'c'=>'create myFunction()'
				],
			'correct' => 'b'
        ],
	];
	
	print "<br><hr><br>"; //Line Break
	if(isset($_POST['q'])) {
		$quest = $_POST['q'];
		print "<dl>";
		foreach ($questions as $q => $text) {
			if($quest == $q) {
				print"<h3>$q</h3>"; //Question Number
				print "<dt>$text[text]</dt>"; //Question Text 'text'
				print "<dd>";
				foreach ($text['choices'] as $question => $abc) {
					print "<ol>$question: "; //Question answer letter
					print htmlspecialchars(" $abc"); //Question answer text
					print "</ol>"; //Used for proper spacing
				}
				print "<br>Correct Answer: $text[correct]<br><br>"; //Answer 'correct'
				print "</dd></dl>";
				print "<br><br><hr><br>"; //Line Break
			}
		} 
	}
	?>

	<input type = "radio" name = "q" value = "q1">q1<br>
	<input type = "radio" name = "q" value = "q2">q2<br>
	<input type = "radio" name = "q" value = "q3">q3<br>
	<input type = "radio" name = "q" value = "q4">q4<br>
	<input type = "radio" name = "q" value = "q5">q5<br>
	<input type = "radio" name = "q" value = "q6">q6<br>
	<input type = "radio" name = "q" value = "q7">q7<br>
	<input type = "radio" name = "q" value = "q8">q8<br>
	<input type = "radio" name = "q" value = "q9">q9<br>
	<input type = "radio" name = "q" value = "q10">q10<br>
	<br><br><input type="submit"> <input type="submit" value = "Reset" onclick = reset()>	<!-- Submit and Reset button -->
	</form>
</HTML>