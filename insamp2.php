<?php
  require 'lab/db/dbcon.php';
  $num = count($_POST['parnam']) OR ($_POST['bacnam']);
  $contid=mysqli_escape_string($con, $_POST['contid']);
  $sampno=mysqli_escape_string($con, $_POST['sampno']);
  $statno=mysqli_escape_string($con, $_POST['statno']);
  $statname=mysqli_escape_string($con, $_POST['statname']);
  $coltime=mysqli_escape_string($con, $_POST['coltime']);
  $parnam=mysqli_escape_string($con, $_POST['parnam']);
  $parval=mysqli_escape_string($con, $_POST['parval']);
  $bacnam=mysqli_escape_string($con, $_POST['bacnam']);
  $bacval=mysqli_escape_string($con, $_POST['bacval']);

  $sql="INSERT INTO samp (contid,sampno,statno,statname,coltime) VALUES ('$contid', '$sampno','$statno','$statname','$coltime')";
  if ($con->query($sql) === TRUE && $sampno!="" && $statno!="" ) {
      echo "Success! Data inserted";
  }
  else 
  {
      echo "Failed! Please input data";
  }

  if($num > 0){  
      for($i=0; $i<$num; $i++)  
      {  
           if($_POST['sampno'] && $_POST["parnam"][$i] != '' && $_POST["parval"][$i] != '' && $_POST["bacnam"][$i] != '' && $_POST["bacval"][$i] != '')  
           { 

            $sql = "INSERT INTO pardtls(sampno,parnam,parval,bacnam,bacval) VALUES ('".$sampno."','".$parnam[$i]."','".$parval[$i]."','".$bacnam[$i]."','".$bacval[$i]."')";

            $inserted = mysqli_query($con, $sql);
               if($inserted === false){
                echo "A record not inserted at index $i ..<br/>\n";
            }
 
           }  
      } 
     }  
     else  
     {  
          echo "Failed! Please input data";
     } 

?>

