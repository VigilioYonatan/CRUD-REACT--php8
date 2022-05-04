<?php


$cnx = mysqli_connect($_ENV['DB_HOST'],$_ENV['DB_USER'],$_ENV['DB_PASS'],$_ENV['DB_BD']);
if(!$cnx){
echo "<script>
alert('Error db conexion')
</script>";
return;
}