<?php  include('inc/header.php');

    $sql = mysqli_query($connection, "SELECT * FROM users");

    $users=[];
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $users[] = $row;
        }
    }
?>


    <h1 class="text-center col-12 py-3 mb-5">Home Page</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <!-- <th scope="row"><?php echo $user['id'] ?></th> -->
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td>
                            <a class="btn btn-info" href="edit.php?id=<?php echo $user['id'] ?>"> <i class="fa fa-edit"></i>Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $user['id'] ?>"> <i class="fa fa-close"></i>Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php  include('inc/footer.php'); ?>

 
  