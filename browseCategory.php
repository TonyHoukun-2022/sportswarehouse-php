<?php
  require_once "classes/Item.php";
  require_once "classes/Category.php";

  session_start();

  // create a category object
  $item = new Item();
  $category = new Category();

  $message = "";

  // retrieve all categories so they can be listed
  $categoryRows = $category->getCategories();

  // retrieve all items in category so they can be listed
  $itemRows = $item->getItems();

  // start buffer
  ob_start();

  include "templates/browseCategory.html.php";

  $output = ob_get_clean();

  //display categories
  include "templates/layout.html.php";
?>