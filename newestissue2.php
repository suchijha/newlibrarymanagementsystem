<?php session_start();
include 'connection.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <?php 

   
  
  
  
  
  if (isset($_POST["submit"])) {

// Start the session







  $res3 = "INSERT INTO issued_books(book_id,user_id,issued_at,return_date) VALUES ('$_POST[bookId]','$_POST[userId]','$_POST[time]','$_POST[time3]')";
  if ($conn->query($res3) === TRUE) {
    echo" ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $sql2 = "SELECT * FROM issued_books ";
  $queryRun = mysqli_query($conn, $sql2);
  while ($row = mysqli_fetch_assoc($queryRun)) {
    $date = $row['Issued_at'];

    $date1 = strtotime($date);

    $date2 = strtotime('+30 days', $date1);

    $date3 = date('m/d/Y H:i:s', $date2);
  


  $sql5 = "update issued_books set returned_at=STR_TO_DATE('[$date3]', '[%m/%d/%Y %H:%i:%S]') WHERE book_id='$_POST[bookId]' && Issued_at='$_POST[time]'&& return_date='$_POST[time3]'";

  if ($conn->query($sql5) === TRUE) {
    echo " ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
  }








?>



<!DOCTYPE HTML>
<html>
  <head>
  <link rel="stylesheet" href="style.css" />
 
<?php include 'header2.php';?>









<body>


  <div class="form-2">

    <body>
      <form name="myForm" class="cmxform" id="signupForm" method="post" autocomplete="off" onsubmit="  validateForm(event)">
        <div class="h2">

        </div>
        <p id="newemail"></p>

        


        <fieldset style="width:300px;height:400px;border:1px solid black ;background-color:#e6edeb;text-align:left;">
        
          <span>
           
              <input id="bookid" name="bookId" type="number" placeholder="book_id" oninput="myfunction3(this.value) "></input>
        
          </span>
          <span>
           
              <input id="userid" name="userId" placeholder="user_id" type="number" oninput="myfun8(this.value)"></input>
            
            <span>
              
                <input type="text" id="issuedat" placeholder="issued_at" name="time" onfocus="(this.type='datetime-local')">
             
            </span>
          
                <span>
            
                    <input type="text" id="returnedat" placeholder="returned_at" name="time3" onfocus="(this.type='datetime-local')">
               
                </span>
                <span>
              
                    <input class="submit2" type="submit" value="Submit"name="submit" style="margin-left:95px;height:30px; width:80px">
              
                </span>
        </fieldset>
      </form>

      <img src='../root/booklib.gif' style=margin-bottom:300px;height:300px;width:300px;>
  </div>



</body>


</html>
  
 
  </head>


  
