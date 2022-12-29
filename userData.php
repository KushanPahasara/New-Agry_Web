<?php
include("config.php");
class userData
{
    public $id;
    public $fName;
    public $lName;
    public $age;
    public $eMail;
    public $conNumber;
    public $pass;
    public $userName;
    public $gender;
    public $userType; 

    public function AddUser()
    {
        try 
        {
           $conn = Config::GetConnection();
           $query = "INSERT INTO `userdetails`( `fName`, `lName`, `age`, `eMail`, `conNumber`, `pass`, `userName`, `gender`, `userType`) 
                     VALUES (:fName, :lName,:age,:eMail,:conNumber,:pass,:userName,:gender,:userType)";

           $stmt = $conn->prepare($query);
           $stmt-> bindParam(":fName",$this->fName,PDO::PARAM_STR);
           $stmt-> bindParam(":lName",$this->lName,PDO::PARAM_STR);
           $stmt-> bindParam(":age",$this->age,PDO::PARAM_INT);
           $stmt-> bindParam(":eMail",$this->eMail,PDO::PARAM_STR);
           $stmt-> bindParam(":conNumber",$this->conNumber,PDO::PARAM_INT);
           $stmt-> bindParam(":pass",$this->pass,PDO::PARAM_STR);
           $stmt-> bindParam(":userName",$this->userName,PDO::PARAM_STR);
           $stmt-> bindParam(":gender",$this->gender,PDO::PARAM_STR);
           $stmt-> bindParam(":userType",$this->userType,PDO::PARAM_STR);
           $stmt->execute();
           return $conn->lastInsertId();

           

        } 
        catch (PDOException $th)
        {
            throw $th;
        }
    }

    public static function GetUserData()
    {
        try 
        {
            $query = "SELECT `userId`, `fName`, `lName`, `age`, `eMail`, `conNumber`, `pass`, `userName`, `gender`, `userType` FROM `userdetails`";
            $conn =Config::GetConnection();
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $uData = array();

            foreach($result as $data)
            {
                $getUserData = new userData();
                $getUserData->id = $data['userId'];
                $getUserData->fName = $data['fName'];
                $getUserData->lName = $data['lName'];
                $getUserData->age = $data['age'];
                $getUserData->eMail = $data['eMail'];
                $getUserData->conNumber = $data['conNumber'];
                $getUserData->pass = $data['pass'];
                $getUserData->userName = $data['userName'];
                $getUserData->gender = $data['gender'];
                $getUserData->userType = $data['userType'];
                array_push($uData,$getUserData);

            }
            return $uData;

            
        } 
        catch (PDOException $th)
        {
            throw $th;
        }
    }


}

class Comment

{
public $comId;
public $userName;
public $eMail;
public $comDes;


    public function addComment()
    {
        
        try
        {
            $conn = Config::GetConnection();
            $query ="INSERT INTO `commentdata`(`userName`, `eMail`, `comDes`) 
            VALUES (:userName,:eMail,:comDes)";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":userName",$this->userName,PDO::PARAM_STR);
            $stmt->bindParam(":eMail",$this->eMail,PDO::PARAM_STR);
            $stmt->bindParam(":comDes",$this->comDes,PDO::PARAM_STR);
            $stmt->execute();
            return $conn->lastInsertId();
            
        } 
        catch (PDOException $th) {
            throw $th;
        }
    }


    public static function getCom()
    {
        try 
            {
              
                $conn =Config::GetConnection();
                $query ="SELECT `comId`, `userName`, `eMail`, `comDes` FROM `commentdata`";
                $stment= $conn->prepare($query);
                $stment->execute();
                $result = $stment->fetchAll();
                $cmData = array();

                foreach($result as $cData)
                {
                    $getComData = new Comment();
                    $getComData->comId=$cData['comId'];
                    $getComData->userName=$cData['userName'];
                    $getComData->eMail=$cData['eMail'];
                    $getComData->comDes=$cData['comDes'];
                    array_push($cmData,$getComData);

                }
                return $cmData;

            } 
        
            catch (PDOException $th)
            {
                throw $th;
            }
    }


}

?>