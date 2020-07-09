<!DOCTYPE HTML>
<html>
	<head>
		<br>----------------------------------------------------------------------------<br>
		Martine Hernandez<br>
		PHP<br>
		Arrays<br>
		Create random numbers and seperate even from odd numbers.<br>
		Iterate over the array using different type of loops to<br>
		seperate numbers and print.<br>
		----------------------------------------------------------------------------<br>
		<h1>Arrays</h1>
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
	<div>
	<body>
			<div  class="input">
				<form action="Arrays.php" method="post">
					<select name = "Loop">
						<option value="1">For Loop</option>
						<option value="2">While Loop</option>
						<option value="3">Do While Loop</option>
					</select>
					<input type="submit" name="submit">
				</form>
			</div>
	
	<?php
	
	// The following is the exercise prompt.
	// Implement the code to count the number of odd numbers and the number
	// of even numbers are in the array.  The following is how
	// to iterate over an array that is already created.
	// in order to detect if a number is evenly divisible, use the 
	// modulus division operator %
	// if a number modulus 2 is 0, then the number is even, if it is
	// 1 then it is odd.
	
	print"<br>";
	
	if(isset($_POST['submit'])) {
		$loop_type = $_POST['Loop'];
		switch ($loop_type) {
			case 1:
				print "<br> For Loop: <br>";
				for_loop();
				break;
			case 2:
				print "<br> While Loop: <br>";
				while_loop();
				break;
			case 3:
				print "<br> Do While Loop: <br>";
				do_while_loop();
				break;
		}
	}
	else { print "<br>Pick a number for a loop type."; }
	
	function for_loop() {
		// Generate an array of 50 random numbers
		$numbers = array();
		//https://secure.php.net/manual/en/function.rand.php
		for($i=0;$i<50;$i++) {
			$numbers[$i] = rand();
		}

		$count_even = 0;
		$count_odd = 0;
		print "<br>Here are the numbers randomly generated:<br>";
		for($i=0;$i<sizeof($numbers);$i++) {
			print "<br>$numbers[$i]";
	
			if($numbers[$i] % 2 == 0){
				$even[$count_even] = $numbers[$i];
				$count_even++;
			}
			else if ($numbers[$i] % 2 == 1) {
				$odd[$count_odd] = $numbers[$i];
				$count_odd++;
			}
		}

		// output the number of even numbers and the number of odd numbers.
		print "<br><br>Even Numbers:<br>";
		for($a=0;$a<sizeof($even);$a++) {
			print "$even[$a]<br>";
		}

		print "<br>Odd Numbers:<br>";
		for($b=0;$b<sizeof($odd);$b++) {
			print "$odd[$b]<br>";
		}	
		
		// output the number of even numbers and the number of odd numbers.
		print "<br>Number of even numbers: $count_even<br>";
		print "Number of odd numbers: $count_odd<br>";
	}
	
	//for_loop();
	
	// do the same operation as above, but use a while loop instead.
	function while_loop() {
		$numbers = array();
		$count = 0;
		while($count<50) {
			$numbers[$count] = rand();
			$count++;
		}
		
		$count_even = 0;
		$count_odd = 0;
		$count_while_loop = 0;
		$even = array();
		$odd = array();
		
		print "<br>Here are the numbers randomly generated:<br>";
		while(sizeof($numbers) > $count_while_loop) {

			print "<br>$numbers[$count_while_loop]";
	
			if($numbers[$count_while_loop] % 2 == 0){
				$even[$count_even] = $numbers[$count_while_loop];
				$count_even++;
			}
			else if ($numbers[$count_while_loop] % 2 == 1) {
				$odd[$count_odd] = $numbers[$count_while_loop];
				$count_odd++;
			}
			$count_while_loop++;
		}

		// output the number of even numbers and the number of odd numbers.
		$count_even_loop = 0;
		print "<br><br>Even Numbers:<br>";
		while(sizeof($even) > $count_even_loop) {
			print "$even[$count_even_loop]<br>";
			$count_even_loop++;
		}

		$count_odd_loop = 0;
		print "<br>Odd Numbers:<br>";
		while(sizeof($odd) > $count_odd_loop) {
			print "$odd[$count_odd_loop]<br>";
			$count_odd_loop++;
		}	
		
		// output the number of even numbers and the number of odd numbers.
		print "<br>Number of even numbers: $count_even<br>";
		print "Number of odd numbers: $count_odd<br>";

	}
	
	//while_loop();
	
	// implement the same operation using a do while loop.
	function do_while_loop() {
		$numbers = array();
		$count = 0;
		do {
			$numbers[$count] = rand();
			$count++;
		} while($count<50);
		
		$count_even = 0;
		$count_odd = 0;
		$count_while_loop = 0;
		$even = array();
		$odd = array();
		
		print "<br>Here are the numbers randomly generated:<br>";
		do {

			print "<br>$numbers[$count_while_loop]";
	
			if($numbers[$count_while_loop] % 2 == 0){
				$even[$count_even] = $numbers[$count_while_loop];
				$count_even++;
			}
			else if ($numbers[$count_while_loop] % 2 == 1) {
				$odd[$count_odd] = $numbers[$count_while_loop];
				$count_odd++;
			}
			$count_while_loop++;
		} while(sizeof($numbers) > $count_while_loop);

		// output the number of even numbers and the number of odd numbers.
		$count_even_loop = 0;
		print "<br><br>Even Numbers:<br>";
		do {
			print "$even[$count_even_loop]<br>";
			$count_even_loop++;
		} while(sizeof($even) > $count_even_loop);

		$count_odd_loop = 0;
		print "<br>Odd Numbers:<br>";
		do {
			print "$odd[$count_odd_loop]<br>";
			$count_odd_loop++;
		} while(sizeof($odd) > $count_odd_loop);	
		
		// output the number of even numbers and the number of odd numbers.
		print "<br>Number of even numbers: $count_even<br>";
		print "Number of odd numbers: $count_odd<br>";

		}

		//do_while_loop();
	
		?>
	</body>
</HTML>