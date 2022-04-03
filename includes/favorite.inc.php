<?php
 session_start();
?>
<!doctype html>
<html lang="en">
<head>
  	<title>NetFlux</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
  
<body>      
<!--   ---------           HTML        -----------              -->
       
       <header id="header" class="fixed" >
		<div>		
		 <div class="head" style="float:left" >
			 <a href="favorite.inc.php" class="logo"  style="color:black; margin-left : 15px; font-size:20px; letter-spacing: 6px;  ">
		     Netflux
			 </a>		
		 </div>
         <div class="nav"  style=" float: right ;">
           <a href="addFavorite.inc.php" class="logo"   style="color:black; margin-right : 15px; margin-top : 8px;font-size:12px; letter-spacing: 2px;  ">
		     BROWSE 
			 </a>	
         </div>
         </div>
	  </header>
      <section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5" id="wrap">
				
				</div>
			</div>
		</div>
	 </section>

   
<!--   ---------           PHP        -----------              -->
  
      

   <?php
  include_once 'config.inc.php'; 
  $user = mysqli_real_escape_string($link, $_POST['username']);
  $password = mysqli_real_escape_string($link, $_POST['password']);

  $sql = "SELECT * FROM users WHERE id = $password   " ;
  $result = mysqli_query($link,  $sql);
  $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)) {
     $oid = explode( ',' , $row['favourite_movies']); 
    
      if( $user == $row['firstName']){
        $Count = count($oid) ;
        
        foreach ($oid as $oi) {
        } 
      
      }
      else
      {
        echo "<center style='position: absolute; top : 45%; left: 45%;'>Sorry, Wrong Details<center>" ; 
        header('Location : ../index.php');
      }
    }
  } 
       
      else {
        echo "<center style='position: absolute; top : 45%; left: 45%;'>Sorry, Wrong Details<center>" ; 
        header("Location : ../index.php");
      }
      

 
 
   $_SESSION['username'] = $user ;
    $_SESSION['password'] = $password;
  
  
      

?>   

    
     
<!--   ---------           JavaScript        -----------              -->
  
	<script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
      <script >

   var coun = "<?=$Count?>";
   var js_array = <?php echo json_encode($oid); ?>;
   for (let i = 0; i < coun; i++) {
        
        
   
   async function getInfo() {
   
   //Fetching API 
   const response = await fetch('http://www.omdbapi.com/?i='+ js_array[i] + '&apikey=b5c1bc9f&select=fields.Title')
   const data = await response.json();
   const { Title, Poster, Plot } = data;
   
   //Creating Elements
   var movie = document.createElement('div');
   var title = document.createElement('p');
   var plot = document.createElement('p');
   var poster = document.createElement('img');
   var remove = document.createElement('input');
   var mybr = document.createElement('br');

    
   //Adding text to the text elements
   var titleValue = document.createTextNode(Title );
   var plotValue = document.createTextNode(Plot);
   
   //Specifying styles and properties of elements
   movie.id = "m" + i ;
   movie.class= "login-wrap p-4 p-md-5";
   movie.style.marginBottom = "50px" ; 
   movie.style.backgroundColor="white";
   poster.src = Poster;
   remove.type = "submit" ;
   remove.value = "Remove" ;
   remove.onclick = function removeMovie() {
   document.getElementById('m'+i).parentNode.removeChild(movie);
   console.log("Deleted");
   }
  remove.style.marginBottom="40px";
   
   
   
    
   
   title.appendChild(titleValue);
   title.appendChild(plotValue);
 
   //Appending the elements to HTML code
   document.getElementById('wrap').appendChild(movie);
   document.getElementById('m'+i).appendChild(poster);
   document.getElementById('m'+i).appendChild(title);
   document.getElementById('m'+i).appendChild(plot);
   document.getElementById('m'+i).appendChild(remove);
   document.getElementById('m'+i).appendChild(mybr);
  

   
};


   getInfo();
  
}

    
</script>

	</body>
</html>

