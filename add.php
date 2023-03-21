<?php  include('inc/header.php'); ?>

<?php
    if(isset($_POST['submit'])){
        $name = filterString($_POST['name']);
        $email = filterEmail($_POST['email']);
        $password = filterString($_POST['password']);

       if(requireFields($name) && requireFields($email) && requireFields($password)){
            if(minName($name, 3)){
                if(maxPass($password, 20)){
                    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
                    $sql = mysqli_query($connection, "INSERT INTO users (name,email ,password) VALUES ('$name', '$email', '$hashed_pass')");
                    if($sql){
                        $success= 'Added Successfully';
                    } 
                }else{
                    $error = 'password must be less than 20 char !';
                }
            }else{
                $error = 'your name must be more than 3 char !';
            }
       }else{
            $error = 'Please Fill All Fields !';
       }
    }
?>
    <h1 class="text-center col-12  py-3">Add New User</h1>
    <div class="col-md-6 offset-md-3 mt-5">
        <?php if($error):?>
            <p class="alert alert-danger text-center"><?php echo $error ?></p>
        <?php endif; ?>

        <?php if($success):?>
            <p class="alert alert-success text-center"><?php echo $success ?></p>
        <?php endif; ?>
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" >
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" class="btn btn-primary w-100 mt-2" name="submit">Submit</button>
        </form>
    </div>
   
<?php  include('inc/footer.php'); ?>

 
