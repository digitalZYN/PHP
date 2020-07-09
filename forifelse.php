<html>
	<body>
		---------------------------------------------------<br>
		Martine Hernandez<br>
		cis94 PHP<br>
		---------------------------------------------------<br><br>

		<form action="forifelse.php" method="post">
			Number 1: <input type="number" name="number1"><br>
			Number 2: <input type="number" name="number2"><br>
			Number 3: <input type="number" name="number3"><br>
			Number 4: <input type="number" name="number4"><br>
			<input type="submit">
		</form>

	<!--
	Martine Hernandez
	PHP
	If/ELSE & Loops 
	Comparison of 4 numbers inputted by the user
	-->


	<?php

		if(isset($_POST['number1']) && isset($_POST['number2'])&& isset($_POST['number3'])&& isset($_POST['number4'])) {
	
			$numbers[0] = $_POST['number1'];
			$numbers[1] = $_POST['number2'];
			$numbers[2] = $_POST['number3'];
			$numbers[3] = $_POST['number4'];
	
			echo"---------------------------------------------------<br>";
			echo"Your numbers  are: <br>";
			echo"---------------------------------------------------<br>";
			for($ind=0; $ind<4; $ind++){
			$num = ($ind+1);
			echo "Number $num : $numbers[$ind]<br>";
		}
	
		$pair = 0;
	
		for($index1 = 0; $index1<3; $index1++) {
			$count = ($index1+1);
			for($index2 = ($index1+1);$index2<4;$index2++) {
				$count2 = ($index2+1);
				if($numbers[$index1] === $numbers[$index2] && $index1 !== $index2) {
					echo"---------------------------------------------------<br>";
					echo "I found a match: Number $count: $numbers[$index1] and Number $count2: $numbers[$index2]<br>";
					$pair++;
				}
			}
		}
	
		if($pair == 2) {
			echo"---------------------------------------------------<br>";
			echo "<br>I FOUND TWO MATCHES!!";
		}
		else {
			echo"---------------------------------------------------<br>";
			echo "<br>There are less than two matches or no match.  Number of matches:  $pair";	
		}
	}

	?>

	</body>
</html>