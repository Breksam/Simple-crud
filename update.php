<?php include('inc/header.php');

if(isset($_POST['submit'])){
    $name = filterString($_POST['name']);
    $email = filterEmail($_POST['email']);

   if(requireFields($name) && requireFields($email)){
        if(minName($name, 3)){
            $id = $_POST['id'];
            if(!empty($_POST['password'])){
                if(maxPass($password, 20)){
                    $password = filterString($_POST['password']);
                    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

                    $sql = mysqli_query($connection, "UPDATE users SET name='$name' , email='$email', password ='$hashed_pass' WHERE id = '$id' ");
                }else{
                    $error = 'password must be less than 20 char !';
                }
            }else{
                $sql = mysqli_query($connection, "UPDATE users SET name = '$name',email='$email' WHERE id = '$id' ");
            }
            if($sql){
                $success= 'Updated Successfully';
                header("refresh:1;url= index.php");
            } 
        }else{
            $error = 'your name must be more than 3 char !';
        }
   }else{
        $error = 'Please Fill All Fields !';
   }
}
?>

<h1 class="text-center col-12 py-3 my-2">Update Info About User</h1>
<?php if($error):?>
    <p class="alert alert-danger text-center"><?php echo $error ?></p>
    <a class="btn btn-secondary" href="javascript:history.go(-1)"><< Go Back</a>
<?php endif; ?>

<?php if($success):?>
    <p class="alert alert-success text-center"><?php echo $success ?></p>
<?php endif; ?>

<?php include('inc/footer.php')?>
