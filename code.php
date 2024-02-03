<?php
include('config/dbcon.php');
session_start();

if(isset($_POST['delete_adminbtn']))
{

    $id = $_POST['admin_id'];

   $sql1 = "DELETE FROM tbl_admin WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
        
        echo 200;

    }
    else
    {
        echo 500;
    }


}

else if(isset($_POST['delete_inventorybtn']))
{

    $invid = $_POST['inventory_id'];
    
    $inventorysql = "DELETE FROM tbl_product WHERE id = $invid";
     // Execute the delete query
     $invresult = mysqli_query($conn, $inventorysql);

     if ($invresult) {
         // Check if any rows were affected by the delete query
         if (mysqli_affected_rows($conn) > 0) {
             echo 500; // Success
         } else {
             echo 1000; // Failed (no rows affected)
         }
     } else {
         echo 1000; // Failed (query execution error)
     }

}


?>