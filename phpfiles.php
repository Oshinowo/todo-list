<?php
include 'config.php';

##### INSERTING TASK #########
if (isset($_POST['submit'])) {
	$task = ucfirst(htmlentities($_POST['task']));
	$task = mysqli_real_escape_string($con,$task);
	$date = $_POST['date'];
	$clock = $_POST['clock'];
	$query_todo_list = mysqli_query($con,"INSERT INTO tasks(task,calender,clock) VALUES ('$task','$date','$clock')");
}
#############################################
#############################################

###### UPDATING TASK #########
if (isset($_POST['update']) && isset($_POST['taskid'])) {
	$updatetask = htmlentities(ucfirst($_POST['updatetask']));
	$updatetask = mysqli_real_escape_string($con,$updatetask);
	$updatedate = $_POST['updatedate'];
	$updateclock = $_POST['updateclock'];
	$taskid = $_POST['taskid'];
	$update_query_todo_list = mysqli_query($con,"UPDATE tasks SET task='$updatetask', calender='$updatedate', clock='$updateclock' WHERE id ='$taskid'");
}
#############################################
#############################################

###### DELETING TASK #########
if (isset($_GET['del'])) {
	$delete = $_GET['del'];
	$delete_query = mysqli_query($con,"DELETE FROM tasks WHERE id = '$delete'");
	if ($delete_query) {
		header('Location: todolist.php');
	}
}
#############################################
#############################################
?>