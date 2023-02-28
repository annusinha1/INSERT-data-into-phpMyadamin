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
        <div class="form-group">
            <lable>Section</lable>
            <input type="text" name="section" class="form-control">
        </div>
        <div class="form-group">
            <lable>RollNo.</lable>
            <input type="text" name="rollno" class="form-control">
        </div>
        <div class="form-group">
            <lable>D.O.B</lable>
            <input type="text" name="dob" class="form-control">
        </div>
        <input type="submit" name="login" class="btn btn-primary" onclick="btn()">
    </form>
    <script>
        function btn(){
            alert("successful submit ");
        }
    </script>
    <pre>
    <?php
    require 'Database.php';
    $db = DB::getInstance();
    if(isset($_POST['login'])){
      
        $name  = $_POST['studentname'];
        $class = $_POST['class'];
        $section =$_POST['section'];
        $rollno = $_POST['rollno'];
        $dob =$_POST['dob'];
       
        $result = $db->insert('register', [
            "studentName" => $name, 
            "class" => $class, 
            "section" => $section, 
            "rollNo" => $rollno, 
            "dob" => $dob
        ]);

        if( $result == true ){

           echo header("Location: /phpsql/practice1.php");
            // if($getData){
            //     print_r($getData);
            // }       
         }
    }

    print_r( $db->from("register")
    ->select("studentName")
    ->get() );
    
    ?>
</body>
</html>