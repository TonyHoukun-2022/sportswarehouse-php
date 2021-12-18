<?php
  require_once "classes/Category.php";

  session_start();

  $category = new Category();
  $categoryRows = $category->getCategories();


  $title = "Checkout";

  // start buffer
  ob_start();

  // display checkout form
  include "templates/checkoutForm.html.php";

  $output = ob_get_clean();

  include "templates/layout.html.php";
?>