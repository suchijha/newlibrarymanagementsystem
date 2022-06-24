<?php 
session_start();
$id="";
$username="";
$password="";
?> 
<html>
<head><style>
 td[scope="col"] {
    background-color: blue;
    color: #fff;
    font-weight: bold;
}
td[scope="row2"] {
    background-color: yellow;
}
 td[scope="row"]{
    background-color: skyblue;
 }
 table, th, td {
  border: 1px solid grey  ;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
 
   </style>
    <link rel="stylesheet" href="style.css" />
 </head>
    <?php include 'header2.php';?>
    <body> 

    <?php include 'connection.php';
?> <?php
$email1 = $_SESSION['email'];
echo $email1;
$res = mysqli_query($conn,"Select Userid from users where Email='$email1'");

while ($obj = mysqli_fetch_assoc($res))

$useri=$obj['Userid'];

$query="SELECT books.Bookname,issued_books.updation,issued_books.returned_at,issued_books.id,issued_books.user_id, books.Book_categories,issued_books.issued_at,issued_books.returned_at,issued_books.return_date,issued_books.FINE FROM issued_books INNER JOIN books ON books.Bookid=issued_books.book_id where issued_books.user_id='$useri'
";



$queryRun1=mysqli_query($conn,$query);
$queryRun=mysqli_query($conn,$query2);?>
<div style="margin-top:100px">
<table border='1' align="center" >
<col width="250px" />
    <col width="250px" />
    <col width="250px"/>
    <col width="250px"/>
    <col width="250px" />
    <col width="250px"/>
    <col width="250px"/>
    
<tr>
<td scope="col">Bookname </td>

<td scope="col">issued_at</td>

<td scope="col">return_date</td>
<td scope="col">Updation date</td>
<td scope="col">fine</td>
<td scope="col">email</td>
<td scope="col">updation </td>
<td scope="col">issued_bookid</td>

</tr>

<?php while(($row=mysqli_fetch_assoc($queryRun1)) ){
    $bookname=$row['Bookname'];
    $bookCategories=$row['Book_categories'];
    $userId=$row['user_id'];
    $issuedAt=$row['issued_at'];
    $returnedAt=$row['returned_at'];
    $returnDate=$row['return_date'];
    $fine=$row['FINE'];
 $updation=$row['updation'];
 $updationDate=$row['returned_at'];
 $issuedBookid=$row['id'];
 $query3="SELECT users.Email  FROM users INNER JOIN issued_books ON users.Userid=issued_books.user_id where Userid='$userId'";
 $queryRun=mysqli_query($conn,$query3);
 while(($row1=mysqli_fetch_assoc($queryRun)) )
 {
     $EMAIL=$row1['Email'];
 }
 

?>
    

<tr>    
<td scope='row'> <?php echo $bookname;?></td>

<td scope='row2'><?php echo $issuedAt;?></td>

<td><?php echo $returnDate;?></td>
<td><?php echo $updationDate;?></td>
<td><?php echo $fine;?></td>
<td><?php echo $EMAIL;?></td>
<td><?php echo $updation;?></td>
<td><?php echo $issuedBookid;?></td>

</tr> 



<?php
 }?></table></div>