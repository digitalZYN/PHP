<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP include and require test</title>
   
  </head>
  <body>
    <h1>PHP require and include test</h1>
    <p>
      <?php
        echo "Before the file is included<br>";
        // Code for assignment.  
        // experiment with include, require and require_once.  Make a file called functions.php.
        // In that file, create a function that will accept 1 parameter and will return a value which is the parameter divided
        // by 10.  Create another function which just prints out something.
        // 1. try including the file in the functions.php file
        // 2. call the 2 functions from functions.php
        // 3. make a purposeful syntax error in the functions.php file
        // 4.  try require and require_once.
        // 5.  fix any potential problems with this file.
        // 6.  In the README.md file for this repository, report your findings with difference between the 3 different functions
        //     for including the contents of 1 file in another.
        require 'functions.php';
        echo "After the file is included<br>";
        printMe();
        print "<br>".Math(20);
      ?>
    </p>
  </body>
</html>
