<?php


class search
{
function connection(){
    $host="sv9.byethost9.org";
$sql_user="greenswi";
$sql_password="QQ2NVn9[gu!4y1";
$sql_database="greenswi_apps265";

$connection=mysqli_connect($host,$sql_user,$sql_password,$sql_database);
return $connection;
}
function searchGames($user_input){
    $sql="SELECT * FROM games WHERE game_app='0' AND  game_name LIKE '%$user_input%'";
    $result=$this->connection()->query($sql);
    $rowN=mysqli_num_rows($result);//number of games found
    return $rowN-2;
}
    function searchApps($user_input){
        $sql="SELECT * FROM games WHERE game_app='1' AND  game_name LIKE '%$user_input%'";
        $result=$this->connection()->query($sql);
        $rowN=mysqli_num_rows($result);//number of apps found
        return $rowN;
    }
    function searchAll($user_input){
        $sql="SELECT * FROM games WHERE game_name LIKE '%$user_input%'";
        $result=$this->connection()->query($sql);
        if (mysqli_num_rows($result)>0){
            return $result;
        }
        else{
            echo "No Results Found";
        }
    }
    function searchAllNum($user_input){
        $sql="SELECT * FROM games WHERE game_name LIKE '%$user_input%'";
        $result=$this->connection()->query($sql);
        $rowN=mysqli_num_rows($result);
        return $rowN;
    }
}
