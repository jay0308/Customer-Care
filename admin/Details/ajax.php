<?php

 
	include '../../config/connection.php';
    
    // echo "<pre>";print_r($conn);exit;
   
    
    $call_function = $_POST['fnct_name']; 

    $call_function($_POST['id'],$conn);
    //unmark_topmost(4,conn);

  function unmark_topmost($id,$conn){
      $top_most_unmark_query   = " update details set top_most = '0' where details_id = '$id'";
      //global $conn; 
      mysqli_query($conn,$top_most_unmark_query);
      return true;
  }

  function mark_topmost($id,$conn){
      $top_most_unmark_query    = " update details set top_most = '1' where details_id = '$id'";
      mysqli_query($conn,$top_most_unmark_query);
      return true;
     
  }


?>