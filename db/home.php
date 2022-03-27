<?php
session_start();
include('connect.php');
$user_id = $_SESSION['user_id'];
if(isset($_POST['title'])
&& isset($_POST['description'])){
      $title = $_POST['title'];
      $description = $_POST['description'];
      $status = $_POST['status'];
      $date = date('Y-m-d');
      $query = "INSERT INTO goal_table(title,description, date, status, user_id) VALUES('$title', '$description', '$date','$status', '$user_id')";
      if(mysqli_query($conn, $query)){
            $msg = "Data inserted";
            header('Location:../home.php?msg='.$msg);
      }
      else{
            $msg = "some error occured: ".mysqli_error($conn);
            header('Location:../home.php?msg='.$msg);
      }
}else{
      $msg = "all fields are required";
}
?>