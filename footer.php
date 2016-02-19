<div class="row">
			<footer>
			   <div class="row">


				<div id="footer_1" class="medium-4 column">
					<?php
					if(is_active_sidebar('footer_1')){
					dynamic_sidebar('footer_1');
					}
					?>
				</div>

				<div id="footer_2" class="medium-4 column">
					<?php
					if(is_active_sidebar('footer_2')){
					dynamic_sidebar('footer_2');
					}
					?>
				</div>
				<adress id="footer_3" class="medium-4 column">
					<?php
					if(is_active_sidebar('footer_3')){
					dynamic_sidebar('footer_3');
					}
					?>
				</adress>
				</div>
			</footer><!--Fin del footer-->
		</div>
  </div>
  <?php wp_footer(); ?>
 </body>
</html>