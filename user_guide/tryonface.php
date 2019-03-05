<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="content-language" content="en-EN" />
      <title>Try On Face</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- INCLUDE JEELIZ FACEFILTER SCRIPT -->
      <script type="text/javascript" src="<?php echo base_url()?>application/libraries/jeelizFaceFilter/dist/jeelizFaceFilter.js"></script>
      <!-- INCLUDE MATH PART OF THREE.JS -->
      <script type="text/javascript" src="<?php echo base_url()?>application/libraries/jeelizFaceFilter/libs/threejs/matrix/THREEMatrix.js"></script>
      <!-- INCLUDE DEMO SCRIPT -->
      <script type="text/javascript" src="<?php echo base_url()?>application/libraries/jeelizFaceFilter/demos/CSS3D/comedy-glasses/demo_comedyGlasses.js"></script>
      <!-- INCLUDE FORK ME ON GITHUB BANNER -->
      <script type="text/javascript" src="<?php echo base_url()?>application/libraries/jeelizFaceFilter/demos/appearance/widget.js"></script>
      <link rel="stylesheet" href="<?php echo base_url()?>application/libraries/jeelizFaceFilter/demos/appearance/style.css" />
      <!--link rel='stylesheet' id='flatsome-icons-css'  href='https://eyelooks.in/wp-content/themes/flatsome/assets/css/fl-icons.css?ver=3.3' type='text/css' media='all' />
         <link href="<?php echo base_url(); ?>application/views/frontend_products/contactform.css" type="text/css" rel="stylesheet" />
         <link href="<?php echo base_url(); ?>application/views/frontend_products/contactform2.css" type="text/css" rel="stylesheet" />
         <link href="<?php echo base_url(); ?>application/views/frontend_products/contactform3.css" type="text/css" rel="stylesheet" />
         <link href="<?php echo base_url(); ?>application/views/frontend_products/contactform4.css" type="text/css" rel="stylesheet" />
         <link href="<?php echo base_url(); ?>application/views/frontend_products/contactform5.css" type="text/css" rel="stylesheet" />
         <!--link href="<?php echo base_url(); ?>application/views/frontend_products/contactform6.css" type="text/css" rel="stylesheet" /-->
      <!--link href="<?php echo base_url(); ?>application/views/frontend_products/contactform7.css" type="text/css" rel="stylesheet" />
         <link href="<?php echo base_url(); ?>application/views/frontend_products/contactform8.css" type="text/css" rel="stylesheet" />
         <link rel="alternate" type="application/rss+xml" title="EyeLooks &raquo; Feed" href="https://eyelooks.in/feed/" />
         <link rel="alternate" type="application/rss+xml" title="EyeLooks &raquo; Comments Feed" href="https://eyelooks.in/comments/feed/" />
         <link href="<?php echo base_url(); ?>application/views/frontend_products/stylesheet1.css" type="text/css" rel="stylesheet" />
         <link href="<?php echo base_url(); ?>application/views/frontend_products/stylesheet2.css" type="text/css" rel="stylesheet" /-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script>
         // jQuery("body").prepend('<div id="preloader">Loading...</div>');
          
         $(document).ready(function(){
         var imageUrl = "<?php echo $image?>";
         	$('#jeelizFaceFilterFollow').css('background-image', 'url(' + imageUrl + ')');
         	
         	//jQuery("#preloader").remove();
         	
         });
      </script>
      <style type='text/css'>
         #jeelizFaceFilterFollow {
         display: block;
         position: absolute; z-index: 1000;
         /*  background-image: url('https://eyelooks.000webhostapp.com/eyelooks/assets/images/products/comedy-glasses.png');  */
         background-size: cover;
         height: 0%;
         width: 0%;
         }
         a img{
         display: none!important;
         }
         .mouthOpened {
         }
         .mouthClosed {
         }
         #jeeFaceFilterCanvas {
         /* YOU SHOULD KEEP the transform: translateZ(-4000px) and the transform-style: preserve-3d;
         OTHERWISE THE DIV WILL BE BEHIND THE CANVAS WITH IOS
         */
         transform: translateZ(-4000px) translate(-50%, -50%) rotateY(180deg);
         transform-style: preserve-3d;
         margin-bottom: 20%;
         }
         /* Eyelooks */
         .container{
         max-width: 100%;
         margin-top: 50%;
         overflow: hidden;
         }
         .logo img{
         height: 60px;
         width: 100px;
         position: absolute;
         top: 0%;  
         }
         .heading-recommend {
         color: black;
         margin-bottom: 0px;
         /* margin-left: 42px; */
         }
         .heading-viewing {
         color: black;
         margin-bottom: 0px;
         /* margin-left: 80px; */
         }
         .product-img {
         box-shadow: 1px 1px 15px rgba(0,0,0,0.15);
         border: 2px solid #ddd;
         color: #777;
         background-color: #fff;
         padding: 18px;
         height: 180;
         width: 200;
         }
         .products {
         box-shadow: 1px 1px 15px rgba(0,0,0,0.15);
         border: 2px solid #ddd;
         color: #777;
         background-color: #fff;
         padding: 18px;
         height: 180;
         width: 200;
         overflow: hidden;
         margin-right: 35px;
         margin-left: 0px;
         }
         .buy {
         background-color: #2b9b90;
         position: absolute;
         /* bottom: -109px; */
         top: 252px;
         width: 237px;
         /* margin-right: -29px; */
         margin-left: -26px;
         height: 26px;
         color: white;
         text-align: center;
         position: absolute;
         font-size: 18px;
         left: 73.5%;
         text-transform: uppercase;
         }
         ul {
         display: inline-flex;
         margin-left: -151.5px;
         }
         span{color : black;}
         .tryface{
         background-color: #2b9b90;
         position: absolute;
         /* bottom: -109px; */
         top: 190px;
         width: 100%;
         height: 26px;
         color: white;
         text-align: center;
         position: absolute;
         font-size: 18px;
         left: 10%;
         text-transform: uppercase;
         margin-left: -24px;
         }
         a:hover {
         color: white;
         }
         .present {
         width: 800px;
         /* max-width: 100%; */
         margin: 0 auto;
         position: relative;
         overflow: hidden;
         }
         .recommended {
         /* max-width: 900px; */
         width: 800px;
         margin: 0 auto;
         overflow: hidden;
         }
         .logo{
         /* margin-bottom: 25px; */
         position: fixed;
         top: 0%;
         width: 100%;
         background-color: white;
         z-index: 99;
         height: 20%;
         }
         .sub-cat{
         text-transform: uppercase;
         opacity: 0.5;
         }
         .product-price
         {
         font-size: 15px;
         }
         .products img{
         height: 200; 
         width: 200;
         position: absolute; 
         right: 20px;
         top: 0px;
         }
         .product-img img{
         height: 200; 
         width: 200;
         position: absolute; 
         right: 20px;top: 62px;
         }
         .loader{
         position: absolute;
         left: 35%;
         width: 100px;
         top: 50%;
         }
         @media (max-width: 550px)
         {
         ul{display: block;} 
         .present {
         margin-top: 30%;
         margin-bottom: 8%;
         }
         .logo{
         margin-bottom:10%;
         position: absolute;
         top: 10px;
         }
         .recommended{
         margin: 50px auto;
         }
         .heading-viewing{
         margin-left: 42px;
         font-size: 40px;
         }
         .logo{
         margin-bottom: 20px;
         }
         .logo img {
         height: 150px;
         width: 150px;
         }
         .product-price
         {
         font-size: 30px;
         }
         .sub-cat{
         font-size: 25px;
         }
         .product-name
         {
         font-size: 25px;
         }
         .products{
         margin-top: -89px;
         height: 300;
         width: 300;
         }
         .products img{
         height: 300; 
         width: 300;
         }
         .product-img {
         height: 300;
         width: 300;
         }
         .product-img img {
         height: 300;
         width: 300;
         }
         .tryface {
         top: 292px;
         width: 100%;
         height: 43px;
         font-size: 30px;
         left: 10%;
         margin-left: -34px;
         }
         .buy {
         top: 369px;
         width: 336px;
         margin-left: -125px;
         height: 43px;
         position: absolute;
         font-size: 30px;
         left: 73.5%;
         }
         .heading-recommend {
         font-size: 40px;
         margin-top: 162px;
         }
         }
         @media screen and (max-width: 800px) and (min-width: 400px) {
		  body {
		    background-color: lightgreen;
		  }
		}
   
      </style>
   </head>
   <body onload="main()" style= "color: white;">
      <div  class = "logo">
         <img src="<?php echo base_url(); ?>application/views/frontend_products/images/EyeLookLogo-1.png"  alt="EyeLooks"/></a>
      </div>
      <div class = "container">
         <canvas width="1024" height="1024" id='jeeFaceFilterCanvas'></canvas>
         <div id='jeelizFaceFilterFollow'>
         </div>
         <div  class = "loader">
            <img style = "height: 145px;" src="https://media1.tenor.com/images/a6a6686cbddb3e99a5f0b60a829effb3/tenor.gif?itemid=7427055"  alt="EyeLooks"/></a>
         </div>
         <?php //print_R($products); die;?>
         <div class = "present" >
            <div style = "float:left;">
               <h1  class = "heading-viewing">Presently viewing</h1>
            </div>
            <div style = "float:right; overflow: hidden;" class= "product-img">
               <img  src="<?php echo $image?>" >
               <?php if($products[0]['button_name'] != ""){?>
               <a href="<?php echo $products[0]['button_link']?>" class="buy" ><?php echo $products[0]['button_name']?></a>
               <?php } ?>
            </div>
         </div>
         <div class = "recommended" >
            <h1  class = "heading-recommend">Recommended</h1>
            <ul>
               <?php if($related_products){ 
                  foreach($related_products as $data){?>
               <li>
                  <div class= "products"  style = "position: relative;" >
                     <img  src="<?php echo base_url('assets/images/products/'.$data['image'])?>" >
                     <a  class="tryface" href="<?php echo base_url('users/tryOnFace?product='.$data['id']); ?>">Try On Face</a>
                  </div>
                  <div class = "description" style = "display: grid; margin-top: -33px;">
                     <span class = "sub-cat" ><?php echo $data['sub_cat'];?></span>
                     <span class = "product-name"><?php echo $data['name'];?></span>
                     <span class="product-price"><span style = "opacity: 0.5;"><del><i class="fa fa-inr" ></i><?php echo $data['price']?><del>&nbsp;</span><i class="fa fa-inr" ></i><?php echo $data['save_price']?></span>
                  </div>
               </li>
               <?php }} ?>
            </ul>
         </div>
      </div>
      <!--style>
         #footer{
         padding: 30px;
         }
         .footer-top
         {
         max-width: 100%;
         height: 50%;
           background-color: #777;
         }
         .footer-bottom
         {
         height: 20%;
         max-width: 100%;
           background-color: #5b5b5b;
         }
         </style>		
         
         <footer id="footer" class="footer-wrapper">
         
         <div class= "footer-top">
         </div>
         <div class = "footer-bottom">
         </div>
         </footer-->
   </body>
</html>