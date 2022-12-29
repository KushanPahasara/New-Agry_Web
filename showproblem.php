<?php

include("userData.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
try{
$cmData = Comment::getCom();
foreach($cmData as $cmd){
$cmId=  $cmd->comId;
$cmuName = $cmd->userName;

$cmDes = $cmd->comDes;


echo $cmId ." "
;
echo $cmuName." "
;
echo $cmDes. "<br>";
}
}
catch (Exception $th)

        {
            echo($th->getMessage());

        }

        ?>
    
</body>
</html>
