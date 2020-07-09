<?php
/**
 * User: Martin
 * Date: 5/3/2018
 * Time: 8:13 PM
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
 */

function printMe() {
    echo "I'm using printMe()";
}

function Math($real_number) {
    return $real_number/10;
}

?>