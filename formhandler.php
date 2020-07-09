<html>

    <body>

        <form method="post">

           var 1: <input type="text" name="var1"> <br>

           var 2: <input type="text" name="var2"> <br>

        </form>

<?php



/******************************************************************************



This is some embedded php code.

*******************************************************************************/



echo "Hello World<br>";

if(isset($_POST['var1']))

{

    echo "{$_POST['var1']}<br>";

}

if(isset($_POST['var2']))

{

    echo "{$_POST['var2']}<br>";

}

?>

    

    </body>

</html>