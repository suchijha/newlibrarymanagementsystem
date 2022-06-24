
<?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
echo $_POST['id'];
$sql = "DELETE FROM issued_books WHERE id=$_POST[id]";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} 

?>