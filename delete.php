<?php  include('inc/header.php'); 

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: index.php');
    }
    $id = $_GET['id'];
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE id ='$id'");
    $users=[];
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $users[] = $row;
        }
    }else{
        header('location: index.php');

    }
    $sql = mysqli_query($connection, "DELETE FROM users WHERE id = '$id'");
    if($sql){
        $success= 'Deleted Successfully';
        header("refresh:1;url= index.php");
    } 
?>
    <?php if($success):?>
    <p class="alert alert-success text-center mt-5"><?php echo $success ?></p>
    <?php endif; ?>
<?php  include('inc/footer.php'); ?>

 
  