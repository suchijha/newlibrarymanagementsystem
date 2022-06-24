<div class="header">
  <a href="#default" class="logo">Library &nbsp;&nbsp;&nbsp;&nbsp;Admin</a>
  
  <div class="header-right">

    <a class="dbs" href="login.php">Login</a>
    <a class="dbs" href="newadd.php">Add Book </a>
    <a  class="dbs" href="dbs.php" >Home</a>
    <a class="dbs"href="new.php">Registration</a>
    <a class="dbs" href="registered.php">Users</a>
  </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script>
$(document).ready(function () {
    var sideBarButtons = $(".header-right");
    console.log(sideBarButtons);
 var url= window.location.pathname;
 var filename = url.substring(url.lastIndexOf('/')+1);
console.log(filename);
var btns = document.getElementsByClassName("dbs");

    $('.header-right').find('a').each(function() {
       
        if($(this).attr('href')==filename){
            this.className += " active";

      console.log(this.className);

  
    }
});

})
      

</script>