

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="content-language" content="en-EN" />
        
       
        
        <!-- INCLUDE JEELIZ FACEFILTER SCRIPT -->
        <script type="text/javascript" src="<?php echo base_url('application/libraries/jeelizFaceFilter-master/dist/jeelizFaceFilter.js');?>"></script>

        <!-- INCLUDE MATH PART OF THREE.JS -->
        <script type="text/javascript" src="<?php echo base_url('application/libraries/jeelizFaceFilter-master/libs/threejs/matrix/THREEMatrix.js');?>"></script>

        <!-- INCLUDE DEMO SCRIPT -->
        <script type="text/javascript" src="<?php echo base_url('application/libraries/jeelizFaceFilter-master/demos/CSS3D/comedy-glasses/demo_comedyGlasses.js?1');?>"></script>

        <!-- INCLUDE FORK ME ON GITHUB BANNER -->
        <script type="text/javascript" src="<?php echo base_url('application/libraries/jeelizFaceFilter-master/demos/appearance/widget.js');?>"></script>

        <link rel="stylesheet" href="<?php echo base_url('application/libraries/jeelizFaceFilter-master/demos/appearance/style.css');?>" />

        <style type='text/css'>
        #jeelizFaceFilterFollow {
            display: block;
            position: absolute; z-index: 1000;
            background-image: url('https://github.com/jeeliz/jeelizFaceFilter/blob/master/demos/CSS3D/comedy-glasses/comedy-glasses.png?raw=true');
            background-size: cover;
            height: 200px; width: 200px;
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
        }
        </style>

    </head>
    
     <body onload="main()" style='color: white'>
        <canvas width="1024" height="1024" id='jeeFaceFilterCanvas'></canvas>

        <div id='jeelizFaceFilterFollow' style = "">
            
        </div>
		
    </body>
</html>
 