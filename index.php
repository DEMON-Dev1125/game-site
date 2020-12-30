<?php include('header.php');?>


 
 <div class="slideshow-container">

   <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="slider/wp3276765.jpg">

  </div>
  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="slider/wp3246579.jpg">

  </div>

  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="slider/uwp235072.jpeg">

  </div>
  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="slider/wp3246576.jpg">

  </div>

  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="slider/wp2462450.jpg">

  </div>
  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="slider/wp2661673.jpg">

  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center; display: none;">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  <span class="dot" onclick="currentSlide(6)"></span>  
</div>
<div class="container">
  <div class="row highlight">
    <div class="leftcolumn  col-md-8 col-sm-12">

      <div class="card">
        <h2>PLAY GAMES <i class='fas fa-gamepad' style='font-size:20px;color:darkred'></i></h2>

        <img src="slider/playgame.jpg">

        <p>These texting games include popular party games such as Would you rather question game, Never have I ever game, the 20 questions game and other fun and exciting games you can play over text, Snapchat, WhatsApp and even email.</p>
      </div>
    </div>
    <div class="rightcolumn col-md-4 col-sm-8">

      <div class="card">
        <h3>You May like <i class='fas fa-thumbs-up' style='font-size:20px;color:darkred'></i></h3>
        <img src="slider/child.jpg"><br>
        <img src="slider/wp3276788.jpg"><br>
        <img src="slider/hqdefault.jpg"></div>
      </div>

    </div>

<?php 
include("admin/pages/database.php");
$sql = "SELECT * FROM uploaded_game";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);

  ?>
 <div class="row downlgrid">
  <?php
if(($count) > 0){
  foreach($result as $key=> $val) {
$game_id =base64_encode($val['id']);
   ?>
    <div class="col-md-3 col-sm-6 col-xs-6 downmain">
      <div class="imgtxtdiv">
    <a href="shop.php?product=<?php echo $game_id; ?>"> <img class="download_game" src="admin/pages/upload/<?php echo $val['image']; ?>"></a>
     <div class="ratting"> 
            <i class='far fa-star'></i>
            <i class='far fa-star'></i>
            <i class='far fa-star'></i>
            <i class='far fa-star'></i>
            <i class='far fa-star'></i>
            <i class="fa fa-download" aria-hidden="true"></i>
          </div>
           
          <h4 class="product-title"><a href="shop.php?product=<?php echo $game_id; ?>"><?php echo $val['short_desc']; ?>...</a></h4>
    </div>
    </div>
      <?php } }?>



  </div>
   
</div>
</div>

<?php include('footer.php');?>
<style type="text/css">
 <?php include('style.css');?> 
</style>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>