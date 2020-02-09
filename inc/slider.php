
<section class="slider">
				  <div class="flexslider">
					<ul class="slides">

                    <?php 

                    $objofslider=new slider();

                    $catch_slider=$objofslider->showSlider(); 

                     if($catch_slider){

                     	while ($result=$catch_slider->fetch_assoc()) {
                     

                    ?>
						<li><img src="admin/<?php echo $result['slide']; ?>" alt=""/></li>
						
                   <?php  }  } ?>

				    </ul>
				  </div>
 </section>