<!DOCTYPE HTML>
<html>
	<head>
		<br>---------------------------------------------------<br>
		Martine Hernandez<br>
		PHP<br>
		Mad Libs<br>
		Takes in words from the user, enters it in a story and prints.<br>
		Focus of the assignment is to create functions<br>
		---------------------------------------------------<br>
		<h1>Mad Libs</h1>
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
		</style>
	</head>
	
	<div>
	<body>
			<div  class="input">
				<form action="madlibs.php" method="post">
					Adjective:			<input type="text" name="Adjective"><br>
					Another Adjective:	<input type="text" name="Adjective2"><br>
					Verb: 				<input type="text" name="Verb"><br>
					Another Verb:		<input type="text" name="Verb2"><br>
					Past Tense Verb:	<input type="text" name="Past_Verb"><br>
					Noun: 				<input type="text" name="Noun"><br>
					Living Thing:		<input type="text" name="LivingThing"><br>
					Girl's Name:		<input type="text" name="Girl"><br><br>
					<input type="submit">
				</form>
	</div>
		
		<!--
		Martine Hernandez
		PHP
		Mad Libs
		Takes in words from the user, enters it in a story and prints.
		Focus of the assignment is to create functions
		-->

		<?php			
			if(isset($_POST['Adjective']) && isset($_POST['Verb'])  && isset($_POST['Past_Verb']) && isset($_POST['Noun']) && isset($_POST['Girl']) && isset($_POST['LivingThing']) && isset($_POST['Verb2']) && isset($_POST['Adjective2'])) {			
			
				function Assign_Variables() {
					$Adjective = $_POST['Adjective'];
					$Adjective2 = $_POST['Adjective2'];
					$Verb = $_POST['Verb'];
					$Verb2 = $_POST['Verb2'];
					$Past_Verb = $_POST['Past_Verb'];
					$Noun = $_POST['Noun'];
					$Girl = $_POST['Girl'];
					$LivingThing = $_POST['LivingThing'];
			
					Print_Story($Adjective, $Adjective2, $Verb, $Verb2, $Past_Verb, $Noun, $Girl, $LivingThing);
				}
			
				function Print_Story($Adjective, $Adjective2, $Verb, $Verb2, $Past_Verb, $Noun, $Girl, $LivingThing) {
					print"
						THE FAIRLY TALE <br> 
						------------------------------ <br>
							Once upon a time there was a poor little girl named $Girl who lived in the forest with a(n) $Adjective 	<br>
						$LivingThing. She was forced to $Verb all day while the $LivingThing sat around $Verb2 . But then one 		<br>
						day the little girl found a magic $Noun . When $Girl picked up the $Noun, she found that anything she 		<br>
						imagined came true. Soon, $Girl was making the $LivingThing $Verb while she chose to sit around and			<br>
						$Verb2 . After a while, the girl realized this was not a very $Adjective2 thing to do and released the 		<br>
						$LivingThing from her spell. They became best friends and $Past_Verb every day, living happily ever after.  <br>";
				}
				
				Assign_Variables();
				
			}
			else {
				print"<br>Please enter a word in each box.";
			}
		?>
	</body>
</html>