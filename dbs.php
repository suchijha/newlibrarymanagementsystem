<?php include 'connection.php';
include 'delete.php';


function getUserCount(){
  include 'connection.php';
$user_count=" ";

$query="Select count(*) as user_count from users";
$queryRun=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($queryRun)){
    $userCount=$row['user_count'];
    return ($userCount);
}

}
function getUserBook(){
  include 'connection.php';
$userCount=" ";

$query="Select count(*) as book_count from book";
$queryRun=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($queryRun)){
    $userCount=$row['book_count'];
    return ($userCount);
}

}
function getUserIssue(){
  include 'connection.php';
$userCount=" ";

$query="Select count(*) as user_count from issued_books";
$queryRun=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($queryRun)){
    $userCount=$row['user_count'];
    return ($userCount);
}

}
function getUserDeposited(){
  include 'connection.php';
$userCount=" ";

$query="Select count(*) as user_count from deposited_book";
$queryRun=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($queryRun)){
    $userCount=$row['user_count'];
    return ($userCount);
}

}

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="design.js"></script>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    
</head>

<body>
<?php include 'header.php';?>
    <div class="form-2">
    

       
       <div class="books">
        

<div class="user_books">
<div class="first-class"><h3> number of users :<?php echo getUserCount() ; ?></h3>
<div class="design-1">  <a href="registered.php" >"registered user" </a></div>
</div> <div class="design-4">
 <div class="second-class"><h3>number of books available :<?php echo getUserBook();?></h3><div class="show"> <a href="show_book.php"> show books </a></div></div>
 <div class="frth-class"><h3>number of issues book: <?php echo getUserIssue();?></h3>
<div class="third-class"><a href="show.php">"show issued book" </a></div></div>
<div class="fourth-class"><h3> number of deposited books:<?php echo getUserDeposited();?> </h3><div class="book">book to submit <button id="myBtn">click</button></div></div></div>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div> enter issuedbook id to be submitted </div>
       <form method='POST'> <input type="number" name="id" >
       <input type="submit" value="Submit">
  </div>


</div><script>
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



    </div>
    
<div class="sixth-class"><a href="newestissue.php"><h3>"To fill issue books detail click here"</h3></a></div>
</body>
</html>