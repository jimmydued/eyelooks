<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="content-language" content="en-EN" />
      <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
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
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <script>        
         $(document).ready(function(){
         var imageUrl = "<?php echo $image?>";
         	$('#jeelizFaceFilterFollow').css('background-image', 'url(' + imageUrl + ')');        
         });
      </script>
	  
	 

   </head>
   <body onload="main()" style= "color: white;">
   <background-image:url(application/views/frontend_products/images/banner.jpeg) width:100;>
	 <div  class = "logo ">
         <img src="<?php echo base_url(); ?>application/views/frontend_products/images/EyeLookLogo-1.png"  alt="EyeLooks"/></a>
      </div>
      <div class = "container-fluid">
         <div>
            <canvas id='jeeFaceFilterCanvas'></canvas>
         </div>
         <div id='jeelizFaceFilterFollow'>
         </div>
         <div  class = "loader">
            <img style = "height: 145px;" src="https://media1.tenor.com/images/a6a6686cbddb3e99a5f0b60a829effb3/tenor.gif?itemid=7427055" width="100"  alt="EyeLooks"/></a>
         </div>
		
         <?php //print_R($products); die;?>
         <div class = "present" >
            <div style = "float:left;">
               <h1  class = "heading-viewing">Presently viewing</h1>
            </div>
            <div style = "float:right; overflow: hidden;" class= "product-img">
               <img  src="<?php echo $image?>" >
               <?php if($products[0]['button_name'] != ""){?>
               <a href="<?php echo $products[0]['button_link']?>" class="tryface" ><?php echo $products[0]['button_name']?></a>
               <?php } ?>
            </div>
         </div>
         <div class = "recommended mt-3">
            <h1  class = "heading-recommend">Recommended</h1>
            <ul>
               <?php if($related_products){ 
                  foreach($related_products as $data){?>
               <li>
                  <div class= "products"  style = "position: relative;" >
                     <img  src="<?php echo base_url('assets/images/products/'.$data['image'])?>">
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
	  
  </body>
</html>