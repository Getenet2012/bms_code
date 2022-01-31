<?php if (isset($con,$_POST['login'])) {
                   $username = mysqli_real_escape_string($conn, $_POST["username"]);  
                   $password = mysqli_real_escape_string($conn, $_POST["password"]);  
                   $sql = "SELECT * FROM bms_admin WHERE username = '$username'";  
                   $result = mysqli_query($con, $sql);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION["username"] = $username;
                          $role=$row['status'];

                          if($role == 'admin'){ 
                           header("location: admin/dashboard.php");
                          }

                          elseif($role=='user'){
                           header("location: user/dashboard.php");

                          }

                          else{
                           header("location: login.php");
                          } 
                     }  
                     else {  
                          //return false;  
                          echo '<script>alert("Wrong User Password")</script>'; 
                          }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Sorry! No such User Name is found")</script>';  
           }    

                    } 
                ?>