<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="form-group">
            <lable> Student name</lable>
            <input type="text" name="studentname" class="form-control">
        </div>
        <div class="form-group">
            <lable>Class</lable>
            <input type="text" name="class" class="form-control">
        </div>
        <input type="submit" name="login" class="btn btn-primary">
    </form>
    <?php
    if(isset($_POST['login'])){
        include('config.php');
        // echo "Host: ".$host." Database: ".$database;



        $NAME  = $_POST['studentname'];
        print($NAME);

        $studentname= mysqli_real_escape_string($conn, $_POST['studentname']);
        $class= md5($_POST['class']);
       
        $sql = "INSERT INTO `register` (`student name`, `class`) VALUES ('$NAME', '12th' )";
        $result= mysqli_query($conn, $sql) or die("Query Failed");
        if($result){
            print($NAME);
        }else{
            print("koi dikt hai ");
        }
    }
    ?>
</body>
</html>