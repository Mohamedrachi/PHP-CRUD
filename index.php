<?php
 include('header.php');
?>


<div class="container mt-5">
<?php
    if (isset($_GET['error'])) {
        $error = $_GET['error'];

        echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Error!</strong> $error
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
          ";
    }
    if (isset($_GET['success'])) {
        $success = $_GET['success'];

        echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>success!</strong> $success
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
          ";
    }
    ?>
    <h1 class="text-light bg-success text-center"> All New Users</h1>
    <div class="d-flex justify-content-between">
    <h3>All Users</h3>
    <a href="" class="btn btn-primary mb-3"data-bs-toggle="modal" data-bs-target="#exampleModal" >Add User</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User name</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Sql statement failed");
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['username'];?></td>
                          <td><?php echo $row['email'];?></td>
                           
                 
                    </tr> 
                    <?php
                }
            }
            ?>
            
            
        </tbody>
    </table>
    
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST">
            <div class="form-group">
                <label for="">User name</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">User Email</label>
                <input type="text" name="email" class="form-control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Add user</button>
        </form>
      </div>
    </div>
  </div>
</div>




<?php
include('footer.php');

?>
