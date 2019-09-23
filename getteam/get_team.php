<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["GroupId"])) {
    // SELECT * FROM Teams WHERE GroupId='A'
	$query ="SELECT * FROM Teams WHERE GroupId = '" . $_POST["GroupId"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Team</option>
<?php
	foreach($results as $team) {
?>
	<option value="<?php echo $team["Id"]; ?>"><?php echo $team["Name"]; ?></option>
<?php
	}
}
?>