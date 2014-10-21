<?
  if($_POST){
            $con=mysql_connect("localhost","root","")
            }

  if(!$con){
           die('Ni povezave z bazo:'. mysql_error());
           }
  mysql_Select_db("symfony",$con);

  $username=$_POST['username'];
  $password=$_POST['password'];

  $username = mysql_real_escape_string($username);
  $password = mysql_real_escape_string($password);

   $articleid = $_GET['id'];
  if( ! is_numeric($articleid) )
    die('invalid article id');

  $query= "
  INSERT INTO 'symfony'.'Zaposlovalec'('id','username','password')
  VALUES (NULL,'$username','$password);

  mysql_query($query);

  echo "<h2>Test</h2>";

  mysql_close($con);
}
?>