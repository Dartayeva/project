<aside id="right_side">
      <?php
	      if($status == 1){
			  echo '
			      <div id="cart_wrap">
                                <div id="cart_header">
                                    <a href="shopping_cart.php" style="text-decoration:none; color: #FFF;">Корзина</a> | <a href="logout.php" style="text-decoration:none; color: #FFF;">Выход</a>
                                </div>
                                <div id="cart_body">
			  ';
		  }else{
			  include_once("scripts/options.php");
		  }
	  ?>                      
</aside>