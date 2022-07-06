<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])  &&   isset($_SESSION['unique_shop_id'])){
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
</head>

   
<?php
    $conn=mysqli_connect("localhost","root","","medicine");
    if(!$conn){
        die("couldn't connect to the database!".mysqli_connect_error());
    }
    ?>
    
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Paper</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="dist/jquery.tabledit.js"></script>
    

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js">
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#checkAll").click(function(){
                if($(this).is(":checked")){
                    $(".checkItem").prop('checked',true);
                }
                else{
                    $(".checkItem").prop('checked',false);
                }
            });
        });
    </script>
</head>
    
   <center><h1>Welcome, <?php echo $_SESSION['name']; ?>
         <br>
         Shop Id <?php echo $_SESSION['unique_shop_id']; ?>
       </h1>
    
    <button><a href="logout.php">Logout</a></button>    </center>
     
     
    

<body class="bg-info">
    <br>
    
    <?php

        $unique_shop_id=$_SESSION['unique_shop_id'];
        $shop_name=$_SESSION['name'];
        if(isset($_POST['submit'])){
            if(isset($_POST['id'])){
                foreach($_POST['id'] as $idd){
                    $query="INSERT INTO temp_db(id,shop_name,unique_shop_id,medicine_name,medicine_type,medicine_composition)
                    SELECT id,'$shop_name','$unique_shop_id',medicine_name,medicine_type,medicine_composition FROM main_db WHERE id = ".$idd;
                    mysqli_query($conn,$query);
                   
                }
            }
        }
    
        $SQL="SELECT * FROM main_db" ;
        $result=mysqli_query($conn,$SQL);
        ?>
    
    <form action="home.php" method="post" class="content-table">
        <div class="container">
            <div class="row justify-content-center mt-2">
                <div class="col-md-15 bg-light rounded">
                    <h2 class="text-center">medicines</h2>
                    
                    <table class="table table-bordered">
    <thead>
      <tr>
          <td colspan="23">
              <input type="submit" name="submit" value="Insert" onclick="return
              confirm('do u want to delete !!')" class="btn btn-success">

          </td>
       </tr>
        <tr>
        <th>SELECT</th>
        <th>ID</th>
        <th>medicine name</th>
        <th>medicinde type</th>
        <th>medicine compo</th>
      </tr>
    </thead>
    <tbody>
        <?php
            while($row=mysqli_fetch_array($result)){
                ?>
      <tr id="<?php echo $row ['id']; ?>">
        <td><input type="checkbox" id="checkItem" value="<?=$row['id']?>" name="id[]"></td>
        <td><?= $row['id']; ?></td>
        <td><?= $row['medicine_name']; ?></td>
        <td><?= $row['medicine_type']; ?></td>
        <td><?= $row['medicine_composition']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>