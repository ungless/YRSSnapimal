<nav><script src=http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js></script><?php
include 'db.php';
$sql = "SELECT * from groups";

$result = mysql_query($sql);

if (!$result) {
  echo "Something went wrong! :(
   Please contact the system admininstrator. 
    Oh wait. That's me.";
  }
  print mysql_error();

?><script>
function search(){
    var title=$(".search").val();

    if(title!=""){
      $("#result").html("<img alt="ajax search" src='ajax-loader.gif'/>");
       $.ajax({
          type:"post",
          url:"search.php",
          data: <?php echo json_encode($_POST['name']); ?>
        });
    } 
}

$("#button").click(function(){
   search();
});

$('.search').keyup(function(e) {
   if(e.keyCode == 13) {
      search();
    }
});
});
</script><div class=logo><img src=img/name.svg></div><div class=nav-elements><a href=index.php>Home</a> <a href=submit-find.php>Submit a find</a> <a href=group.php>Groups</a> <a>News</a><form method=post action=search.php class=search><input class=search type=search placeholder="Search Groups" onkeyup=showResult(this.value)></form></div></nav>