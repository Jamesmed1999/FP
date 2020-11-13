<?php 
include 'dbconnect.php';
date_default_timezone_set('America/New_York');
error_reporting(E_PARSE);
?>
<html>
<head>

    <title>Final Project</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

<p>
    <h1 style="text-align:center "> <img src="img/Banner2.png" alt="Banner2" width="600" height="200"> </h1>
    <h2 style="text-align:center"> FP Message Board</h2>
    
    <?php 
    echo "<h4 style=text-align:center> Currently Logged in as: ".$_COOKIE['user']." ".$_POST['Logout']."</h4>";
    ?>
    <div style="text-align:center">

    <form method="POST">
        <input type="submit" value="Logout" name="Logout">
    </form>
</div>
</p>

<?php 

//query to print out posts
$query1 = "SELECT p.POST_ID,p.POST_BODY,u.FIRSTNAME,p.POST_DATE FROM user AS u, post AS p WHERE u.USER_ID=p.USER_ID ORDER BY p.POST_DATE ASC;";

$stmt = $connect->prepare($query1); 

$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc())
{
    $arr1[] = $row;
}


//prints out posts the first array goes through each row and the for each gets the values from the row associatively

for($i =0; $i<$result->num_rows;$i++){
    echo"<table>";
    foreach($arr1[$i] as $key => $value){

        if($key == "POST_DATE"){
            echo "<tr><td>".date('m/d/Y h:i:sa', $value)."</td></tr>";
        }
        else{
        echo "<tr><td>$value</td></tr>";
        }
    }
    echo"</table>";
    echo"<tr><td></br></td></tr>";
}

?>

</br></br>

<!-- Gathers the body of the post that will be added to the db after -->
<form method="POST">
    <legend><b>Create Post</b></legend>
    <p>
        <textarea  type="text" name="post_body" rows="10" cols="75" required></textarea>
    </p>
    <input type="submit" value="Submit Post">
</form>

<form method="POST">
    <legend><b>Remove Post</b></legend>
    <p>
        <textarea  type="text" name="post_remove" rows="1" cols="30" required>Enter Post ID</textarea>
    </p>
    <input type="submit" value="Remove Post">
</form>

<?php 

//gets userid from the logged in username to be able to create posts
$query2="SELECT u.USER_ID FROM USER AS u WHERE u.USERNAME = ?";
$stmt = $connect->prepare($query2); 
$stmt->bind_param('s',$_COOKIE['user']);
$stmt->execute();


$result = $stmt->get_result();

while ($row = $result->fetch_assoc())
{
    $arr2[] = $row;
}

foreach($arr2[0] as $key => $value){
    $user=$value;
}

//checks if the text area for post is set for before posting to database
if(isset($_POST['post_body'])){

    $post=$_POST['post_body'];
    $sanitizedPost=filter_var($post,FILTER_SANITIZE_STRING);
    $time=time();
    $null= NULL;


    $query3="INSERT INTO POST VALUES(?,?,?,?)";
    $stmt = $connect->prepare($query3);
    $stmt->bind_param('iiss',$null,$user,$sanitizedPost,$time);
    $stmt->execute();
    header("Refresh:0");
    unset($_POST['post_body']);
}
//checks if post remove are is set with a post id before remvoing it from database
if(isset($_POST['post_remove'])){
    $postremove=$_POST['post_remove'];
    $sanitizedRemove=filter_var($postremove,FILTER_SANITIZE_STRING);

    $deleteQuery="DELETE FROM POST WHERE POST_ID = ? AND USER_ID = ?";
    $stmt = $connect->prepare($deleteQuery);
    $stmt->bind_param('ii',$sanitizedRemove,$user);

    $stmt->execute();

//checks if the number of rows affected is 1 (deleted post) or 0 (didnt delete post because post id didnt
    //match up with user id)
    if(mysqli_stmt_affected_rows($stmt)==1){
        header("Refresh:0");
    }
    else{
        echo "<p><b>Post not Found/Not your post</b></p>";
    }

}
//checks if logout is set and then it deletes the cookie for the logged in user and returns to login page
if(isset($_POST['Logout'])){
    setcookie('user',$user,time()-60*60);
    header('Location:login.php');
}


?>

</body>

</html>
