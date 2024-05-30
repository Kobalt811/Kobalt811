<?php 
$link = mysqli_connect('localhost','root','','Antonov2'); 
if(!$link) 
{
    die ("Ошибка: ". mysqli_connect_error());
}

/*else
{
     echo "Соединение успешно";
}*/
?>