<?php
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $cifrado = sha1($pass);
    echo $user;
    echo $cifrado;
?>

<script type="text/javascript">
  window.onload=function(){
                document.formulario.action="./get.exe";
                document.formulario.submit();
}
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <form name="formulario" method="POST" action="./get.exe" >
            <input type="hidden" name="user" value="<?php echo $user?>"/>
            <input type="hidden" name="pass" value="<?php echo $cifrado?>"/>
        </form>
    </body>
</html>
