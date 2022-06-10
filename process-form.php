 <?php
 $name=$_POST['name'];
 $priority=filter_input(INPUT_POST,"priority" ,FILTER_SANITIZE_STRING);
 $type=filter_input(INPUT_POST,"type" ,FILTER_SANITIZE_STRING);
 $message=$_POST['message'];
 $term=filter_input(INPUT_POST,"term",FILTER_VALIDATE_BOOL);
 if(!$term){
    die("Term must be accepted");
 }
// var_dump($name,$priority,$type,$term);

$host="localhost";
$dbname="message_db";
$username="root";
$password="";

$conn=mysqli_connect(
    hostname: $host,
    database: $dbname, 
    username: $username,
    password: $password);

    if(mysqli_connect_errno()){
        die("Connection Error".mysqli_connect_error());
    }
    else{
        echo"Connection Successfull";
    }
    $sql = "INSERT INTO message_db (name, body, priority, type)
    VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {

die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii",
                   $name,
                   $message,
                   $priority,
                   $type);

mysqli_stmt_execute($stmt);

echo "Record saved.";
 ?>