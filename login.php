<?php
    include_once 'header.php';
?>

<h1>Prijava</h1>

<form action="login_check.php" method="post">
    e-pošta: <input type="email" name="email" /><br />
    geslo: <input type="password" name="pass" /><br />
       <h1> ALI STE AGENCIJA </h1>
    <input type="checkbox" name="ok" value="value1" /> DA <br />
    <input type="submit" value="Prijava" />
 
</form>

<?php
    include_once 'footer.php';
?>