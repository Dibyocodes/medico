<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <table id="table">
        <tr>
            <td colspan="2">
                <div class="header"></div>
            </td>
            <td colspan="2" style="text-align:right;">
                <!--<img src="indra.jpg" class="indra" />-->
            </td>
        </tr>
        <tr>
            <td colspan="4">
            </td>
        </tr>
        <tr>
            <td>
                <div class="div1">
                    <img src="img1.png" style="width: 50%;" />
                    <p>Search by maps</p>
                    <button class="btn btn1">Search</button>
                    <a class="btn btn1" href="loc.html">Search</a>
                    
                    <br /><br />
                </div>
            </td>
            <td>
                <div class="div1">
                <img src="img2.png" style="width: 50%;" />
                <p>Search by composition</p>
                <button class="btn btn2">Search</button>
                <br /><br />
                </div>
            </td>
            <td>
                <div class="div1">
                <img src="img3.png" style="width: 50%;" />
                <p>The Quick Brown Fox Jumps Over The Lazy Dog..</p>
                <button class="btn btn3">Category 3</button>
                <br /><br />
                </div>
            </td>
            <td>
                <div class="div1">
                <img src="img4.png" style="width: 50%;" />
                <p>The Quick Brown Fox Jumps Over The Lazy Dog..</p>
                <button class="btn btn4">Category 4</button>
                <br /><br />
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <!--<tr>
            <td class="footer like">LIKE</td>
            <td class="footer comment">COMMENT</td>
            <td class="footer share">SHARE</td>
            <td class="footer subs">SUBSCRIBE</td>
        </tr>
    -->
    </table>
    
     <a href="logout.php">Logout</a>
    <?php
    //include "loc.html";
    ?>
    
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>