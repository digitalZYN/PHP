<html>
<body>
---------------------------------------------------<br>
Martine Hernandez<br>
cis94 PHP<br>
---------------------------------------------------<br><br>

<form action="calculate.php" method="post">
Number 1: <input type="number" name="number1"><br>
Number 2: <input type="number" name="number2"><br><br>
<input type="submit">
</form>

<!--
Martine Hernandez
PHP
Mathematic Values
-->


<?php

if(isset($_POST['number1']) && isset($_POST['number2'])) {
	
	$number1 = $_POST['number1'];
	$number2 = $_POST['number2'];
	
	echo("---------------------------------------------------<br>");
	echo "Number 1: {$_POST['number1']}<br>";
    echo "Number 2: {$_POST['number2']}<br>";
	echo("---------------------------------------------------<br><br>");
	
	$answer = $number1 + $number2;
	echo ("Addition Answer: $answer<br>");
	
	$answer = $number1 - $number2;
	echo ("Subtraction Answer: $answer<br>");

	$answer = $number1 * $number2;
	echo ("Multiplication Answer: $answer<br>");

	$answer = $number1 / $number2;
	echo ("Division Answer: $answer<br>");

	$answer = ABS($number1 - $number2);
	echo ("Distance Answer: $answer<br>");

	$answer = max($number1, $number2);
	echo ("Largest Number: $answer<br>");

	$answer = min($number1, $number2);
	echo ("Minimum Answer: $answer<br>");

}



?>

</body>
</html>