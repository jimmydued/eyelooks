<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="content-language" content="en-EN" />
      <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <title>Eye Looks - Try On Face</title>
	  
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script>
         $(document).ready(function(){
         	var imageUrl = "<?php echo $image?>";
         	$('#jeelizFaceFilterFollow').css('background-image', 'url(' + imageUrl + ')');
         });
         function scrollFunction() {
         	console.log('i am here');  
			detect_callback(false);
		 }
		 window.onscroll = scrollFunction;
      </script>
      <link href="<?php echo base_url(); ?>application/views/frontend_products/tryonface.css" type="text/css" rel="stylesheet">
   </head>
   <body onload="main()" style= "color: white;">
      <div class="tryon-header">
	  	<div class="header-title header-uppercase">
      		<a href="https://eyelooks.000webhostapp.com/eyelooks">Best Eyewear Online Store</a>
      	</div>
      </div>
      <div id="maincontainer">
      	<div id="canvasArea">
        	<canvas id='jeeFaceFilterCanvas' tabindex="1"></canvas>
	  	</div>
      	<div id='jeelizFaceFilterFollow'></div>
	  	<div>
	  		<div class="present">
	        <div class = "present-view-title">
	               <h1 class = "heading-viewing">Presently viewing</h1>
	        </div>
	        <div class="present-view-block product-img">
	            <img  src="<?php echo $image?>" >
	            	<?php if($products[0]['button_name'] != ""){?>
	               <a href="<?php echo $products[0]['button_link']?>" class="buy" ><?php echo $products[0]['button_name']?></a>
	               <?php } ?>
	        </div>
	  	</div>
	  	<div>
	  		<div class="recommended" >
	        <div>
	            <h1 class = "heading-recommend">Recommended</h1>
	        </div>
	        <div>
		        <ul>
		        	<?php if($related_products){ 
		                  foreach($related_products as $data){?>
		            	<li>
		                  <div class= "products"  style = "position: relative;" >
		                     <img  src="<?php echo base_url('assets/images/products/'.$data['image'])?>" >
		                     <a  class="tryface" href="<?php echo base_url('users/tryOnFace?product='.$data['id']); ?>">Try On Face</a>
		                  </div>
		                  <div class = "description description-grid">
		                     <span class = "sub-cat" ><?php echo $data['sub_cat'];?></span>
		                     <span class = "product-name"><?php echo $data['name'];?></span>
		                     <span class="product-price"><span style = "opacity: 0.5;"><del><i class="fa fa-inr" ></i><?php echo $data['price']?><del>&nbsp;</span><i class="fa fa-inr" ></i><?php echo $data['save_price']?></span>
		                  </div>
		            	</li>
		               <?php }} ?>
		        </ul>
			</div>    
	  	</div>
	  	</div>
	  </div>
	  <div class="container">      	 
       	<div  class="loader">
	        <img style = "height: 145px;" src="https://media1.tenor.com/images/a6a6686cbddb3e99a5f0b60a829effb3/tenor.gif?itemid=7427055"  alt="EyeLooks"/>
	    </div>
      	</div>      	            	
	  	<div class="tryon-footer">
	    	<div class="header-uppercase"><h3>Best Eyewear Online Store</h3></div>
			<div class="tryon-footer bottom-footer"></div>
	  	</div>
      </div>          
   </body>
</html>