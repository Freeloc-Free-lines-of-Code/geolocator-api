<html>
<body style="background-color:black; color:white; ">
    
    <center>
    <br><br><br><br><br>
<form action="get-api.php" method="post">
    <input type="submit" name="someAction" value="Get my IP details" />
</form>
    </center>

<?php
function get_ip(){
            if(isset($_SERVER['HTTP_CLIENT_IP'])){
                return $_SERVER['HTTP_CLIENT_IP'];
            }elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
            }
      }

 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
    {
      
$ip=get_ip();

$ud = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
   
        if ($ud &&  $ud['status'] == 'success'){
            echo "<center> COUNTRY: ". $ud['country'] ."<br>  state: ". $ud['regionName'] ."<br>  City: ". $ud['city'] ."<br>  ip : ". $ud['query']."</center>";
        }
        else{
            echo 'Something went wrong.';
        }
}

?>

</body>
</html>
