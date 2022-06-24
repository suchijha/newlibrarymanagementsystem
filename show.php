<?php 
$id="";
$username="";
$password="";
?> 
<html>
    <head>
    <link rel="stylesheet" href="style.css" /> 
   <style>
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
</head>
    <body>
 <?php include 'header.php';?>
 
    <?php include 'connection.php'; 
$query="SELECT books.Bookname,issued_books.id,issued_books.user_id, books.Book_categories,issued_books.issued_at,issued_books.returned_at,issued_books.return_date,issued_books.FINE FROM issued_books INNER JOIN books ON books.Bookid=issued_books.book_id
";

$queryRun1=mysqli_query($conn,$query);
$queryRun=mysqli_query($conn,$query2);?>
<div style="margin-top:100px">
<table  align="center" >
<col width="150px" />
    <col width="150px" />
    <col width="200px"/>
    <col width="150px"/>
    <col width="250px" />
    <col width="200px"/>
    
    
<tr >
<td scope="col">Bookname </td>

<td scope="col">Issued_at</td>

<td scope="col">Return_date</td>
<td scope="col">Fine</td>
<td scope="col">Email</td>
<td scope="col">Issued_bookid</td>
</tr>
</table>
<?php while(($row=mysqli_fetch_assoc($queryRun1)) ){
    $bookname=$row['Bookname'];
    $bookCategories=$row['Book_categories'];
    $userId=$row['user_id'];
    $issuedAt=$row['issued_at'];
    $returnedAt=$row['returned_at'];
    $returnDate=$row['return_date'];
    $fine=$row['FINE'];
 
 $issuedBookid=$row['id'];
 $query3="SELECT users.Email  FROM users INNER JOIN issued_books ON users.Userid=issued_books.user_id where Userid='$userId'";
 $queryRun=mysqli_query($conn,$query3);
 while(($row1=mysqli_fetch_assoc($queryRun)) )
 {
     $emails=$row1['Email'];
 }
 


   ?> 
    
<table   align="center">
<col width="150px" />
    <col width="150px" />
    <col width="200px"/>
    <col width="150px"/>
    <col width="250px" />
    <col width="200px"/>
    
    
<tr><td scope="row"> <?php echo $bookname;?></td>

<td scope="row2"><?php echo $issuedAt;?></td>

<td><?php echo $returnDate;?></td>
<td><?php echo $fine;?></td>
<td><?php echo $emails;?></td>
<td><?php echo $issuedBookid;?></td>
</tr> 
</table>


<?php
 }?>
 </div>
