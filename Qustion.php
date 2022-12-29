<?php
 include ("userData.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
        <h2>Add Your Problems</h2>
    </div>
<div class="wrapper">
    <form method ="post" class="form">
    <?php

try 
{
    if(isset($_POST["bPost"]))
    {
    $comD = new Comment();
    $comD->userName         =$_POST["userName"];
    $comD->eMail            =$_POST["eMail"];
    $comD->comDes           =$_POST["comDes"];
   
   
    $id =$comD->addComment();
    if($id>0)
    {
        echo "Problem added";
    }
    } 
}
catch (Exception $th) 
{
    echo($th->getMessage());
}




?>
   
   <div class="row">
   <div class="input-group">
            <label for="userName">Username</label>
            <input type="text" name ="userName"  placeholder="Enter Username" require>
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email"  name = "eMail" placeholder="Enter Email" require>
        </div>
        <div class="input-group">
            <label for="comDes">Description</label>
            <input type="comDes"  name = "comDes" placeholder="Enter Description" require>
        </div>
       
   </div>

       
        <div class="input-group">
            <button class="btnPost" name="bPost">Post Now</button>
        </div>

    </form>




   


</div>
</body>
</html>