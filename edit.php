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
?>

    <h1 class="text-center col-12 py-3 my-2">Edit Info About User</h1>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="update.php">
            <?php foreach($users as $user):?>
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" value="<?php echo $user["name"] ?>" >
                <input type="hidden" name="id" value="<?php echo $user["id"] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user["email"]?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <?php endforeach;?>
            <button type="submit" class="btn btn-primary w-100 mt-2" name="submit">Submit</button>
        </form>
    </div>
   
<?php  include('inc/footer.php'); ?>

 
  