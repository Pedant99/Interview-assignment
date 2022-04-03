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
			 <a href="addFavorite.inc.php" class="logo"  style="color:black; margin-left : 15px; font-size:20px; letter-spacing: 6px;  ">
		     Netflux
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
      $fav = $_SESSION['username'];
      $pass =  $_SESSION['password'] ;
    
  
 
 

   
      

?>   
    

<!--   ---------           JavaScript        -----------              -->
	<script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
      <script >
   var coun = "<?=$Count?>";
   var js_array = ["tt5109280","tt3480822","tt9032400","tt0870154","tt2382320","tt1160419","tt6264654","tt3228774","tt9347730","tt0293429"];
   for (let i = 0; i < 10; i++) {
        
        
      
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
   var add = document.createElement('input');
   var mybr = document.createElement('br');

    
   //Adding text to text elements
   var titleValue = document.createTextNode(Title );
   var plotValue = document.createTextNode(Plot);
   
   
   //Specifying properties and styles of elements
   movie.id = "m" + i ;
   movie.class= "login-wrap p-4 p-md-5";
   movie.style.marginBottom = "50px" ; 
   movie.style.backgroundColor="white";
   poster.src = Poster;
   add.type = "submit" ;
   add.value = "Add" ;
   add.onclick = function addMovie() {
   document.getElementById('m'+i).parentNode.removeChild(movie);
   console.log("Deleted");
   }
   add.style.marginBottom="40px";
   
   
   
    
   
   title.appendChild(titleValue);
   title.appendChild(plotValue);
   
   //Appending elements to HTML code
   document.getElementById('wrap').appendChild(movie);
   document.getElementById('m'+i).appendChild(poster);
   document.getElementById('m'+i).appendChild(title);  
   document.getElementById('m'+i).appendChild(plot);
   document.getElementById('m'+i).appendChild(add);
   document.getElementById('m'+i).appendChild(mybr);
  


};

   getInfo();
  
}
    
</script>

	</body>
</html>

