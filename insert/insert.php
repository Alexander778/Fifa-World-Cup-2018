<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Fifa World Cup 2018";

$conn = new mysqli($servername, $username, $password,$dbname);

$goals1=$goals2=0;
$team1=$team2='';
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["firTeamG"])) {
        $goals1 = "Goals is required";
     }else {
        $goals1 = $_POST["firTeamG"];
     }
     if (empty($_POST["secTeamG"])) {
        $goals2 = "Goals is required";
     }else {
        $goals2 = $_POST["secTeamG"];
     }
     if (empty($_POST["teamOne"])) {
        $team1 = "Team is required";
     }else {
        $team1 = $_POST["teamOne"];
     }
     if (empty($_POST["teamTwo"])) {
        $team2 = "Team is required";
     }else {
        $team2 = $_POST["teamTwo"];
     }

    // $goals1 = isset($_GET['firTeamG']) ? $_GET['firTeamG'] : "";
    // $goals2 = isset($_GET['secTeamG']) ? $_GET['secTeamG'] : "";
    // $team1 = isset($_GET['teamOne']) ? $_GET['teamOne'] : "";
  // $team2 = isset($_GET['teamTwo']) ? $_GET['teamTwo'] : "";
}
       
 
    if ($goals1 > $goals2) {
        $additionalPoints1 = 3;
        $additionalPoints2 = 0;
            $diff1=($goals1 - $goals2);
            $diff2=($goals2 - $goals1);
    } else if ($goals2 > $goals1) {
        $additionalPoints1 = 0;
        $additionalPoints2 = 3;
            $diff1=($goals1 - $goals2);
            $diff2=($goals2 - $goals1);
    } else if($goals1 == $goals2){
        $additionalPoints1 = 1;
        $additionalPoints2 = 1;
            $diff1=((int) $goals1 - (int) $goals2);
            $diff2=((int) $goals1 - (int) $goals2);
    }
    $conn->query("UPDATE Results SET diff = diff + (".($diff1)."), points = points + ".$additionalPoints1." WHERE id = (Select Id from Teams where Name = ".$team1.")");
    $conn->query("UPDATE Results SET diff = diff + (".($diff2)."), points = points + ".$additionalPoints2." WHERE id = (Select Id from Teams where Name = ".$team2.")");
    // $conn->query("UPDATE Matches SET DayOne = (".($goals1).") WHERE id = (Select Id from Teams where Name = ".$team1.")");
    // $conn->query("UPDATE Matches SET DayOne = (".($goals2).") WHERE id = (Select Id from Teams where Name = ".$team1.")");

    header("Location: /");
 
?>


