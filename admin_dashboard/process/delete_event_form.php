

<?php 
include 'config.php';
// define variables and set to empty values
$success = ""; 
$id="";
$selected="";





//form is submitted with POST method
if (isset($_POST['submit'])) {

    

    
        if(!$conn)
{
    echo "not connected to the server";
}
if(!mysqli_select_db($conn, $db))
 {
    echo "database not selected";
 }
    
    
    
    
                              $sql = "DELETE * FROM ongoing_events";    
                          if(!mysqli_query($conn,$sql))
                          {
                                  $success="Unsucessful";
                          }
                          else
                          {
                                  $success="successful";
                          }

                          mysqli_close($conn);
    
    
    
    
    
    
    
        $selected=$_POST['selected'];
        $max=count($selected);
        if(!empty($selected))

        {
            
            $i=0;
            for($i=0; $i <$max; $i++)
            {
                if(isset($selected[i]))
                {
                          $sql = "DELETE * FROM ongoing_events";    
                          if(!mysqli_query($conn,$sql))
                          {
                                  $success="Unsucessful";
                          }
                          else
                          {
                                  $success="successful";
                          }

                          mysqli_close($conn);

                }
            }
                    

        }

    
                 header("Location: ../admin_home.php");

                    
                    
  
}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>