<?php



?>


<form method="post" action="sql_insert.php">
    Name:<br>
    <input type="text" name="name"><br>
    Date of Birth:<br>
    <input type="date" name="dateOfBirth"><br>
    Gender:<br>
    <input type="radio" name="gender" value="o" checked> Other<br>
    <input type="radio" name="gender" value="f"> Female<br>
    <input type="radio" name="gender" value="m"> Male<br>
    Child Name:<br>
    <input type="text" name="childName"><br>
    Pet Name:<br>
    <input type="text" name="petName"><br>
    <input type="submit">
</form>
