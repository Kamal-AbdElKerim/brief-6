
<?php include 'layout/coon.php';
$isActive = 'index.php';
?>

<?php 
if (isset($_POST['submit'])) {
      // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
     
   

    // Check against admin table
    $admin_query = "SELECT * FROM admin WHERE  Email = '$email' AND Password = '$password'";
    $admin_result = $conn->query($admin_query);
    $AdminData = $admin_result->fetch();

    // Check against user table
    $user_query = "SELECT * FROM users WHERE  Email = '$email' AND Password = '$password'";
    $user_result = $conn->query($user_query);
    $userData = $user_result->fetch();

    if (!empty($AdminData)) {
      
        header("Location: dashboard_Categories.php");
        exit();
    } elseif (!empty($userData)) {
        
        header("Location: products.php");
        exit();
    } else {
        // Invalid credentials
        $error_message = "Invalid email or password. Please try again.";
    }
} else{
  $error_message = "Email and password are required.";
}


}

?>

<!DOCTYPE html>
<html lang="en">

     <?php    include 'layout/head.php'; ?>
     

    <body>
    

   <?php include 'layout/navbar.php' ;
   

   
   
   
   ?>


  
   <?php





      

   
   ?>


<div class="page-index" id="top">

<?php include 'layout/start.php' ?>
</div>

<div class="page-index" id="top">

<!-- ***** form  ***** -->

<div class="container">
         
            <div class="row">

                <div class="col-lg-6  align-items-center justify-content-center">
                    <form method="post"  >
                      <div class="form-group mb-4 ">
                        <label for="exampleInputEmail1" class="form-label">email</label>
                        <input  type="text" name="email" value="" class="form-control rounded-pill" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="form-group mb-5 ">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control rounded-pill" id="exampleInputPassword1">
                      </div>
                      <button name="submit" type="submit" class="btn btn-primary mb-5">Submit</button>
                 
                     <?php if (isset($error_message , $_POST['submit'])  ) { ?>
                        <div class="alert alert-danger mt-4" role="alert">
                            <?php echo $error_message; ?>
                        </div> 
                   

                   
                    </form>
                  </div>
                  
                <?php    } ?> 


           
            </div>
        </div>
   
    </div>
 

    
   <?php include 'layout/footer.php' ; ?>

   <?php include 'layout/js.php' ; ?>



  </body>
</html>