<?php
  require_once "classes/Authentication.php";
  require_once "classes/Category.php";

  $category = new Category();
  $categoryRows = $category->getCategories();

  if(!isset($_SESSION)) {
    session_start();
  }

  $title = "Edit Categories";
  //read stylesheet theme from session
  if(isset($_SESSION["theme"])) {
    $theme = "./styles/" . $_SESSION["theme"] . ".css";
  } else {
    $theme = "./styles/style.css";
  }
  //the authentication class is static so there is no need to create an instance of the class

  $message = "";

  Authentication::protect();

  // insert new category
  // check if addNew button has been pressed
  if(isset($_POST["addNew"])) {
    // check if a category name was supplied
    if(!empty($_POST["newCategoryId"]) && !empty($_POST["newCategoryName"])) {
      $category->addCategory();
    }
    $message = "Category".$_POST["addNew"]."was added!";
    header("Location:editCategories.php");
  }

  // delete category
  // check if delete button has been pressed
  if(isset($_POST["delete"])) {
    // check if a category id was supplied
    if(isset($_POST["categoryId"])) {
      $category->deleteCategory();
    }
    header("Location:editCategories.php");
  }

  // rename category
  // check if modify button has been pressed
  if(isset($_POST["modify"])) {
    // check if a category id was supplied
    if(isset($_POST["modifyCategory"])) {
      $category->modifyCategory();
    }
    header("Location:editCategories.php");
  }


  // start buffer
  ob_start();

  // display admin content
  include "templates/editCategories.html.php";

  $output = ob_get_clean();

  include "templates/loginLayout.html.php";
?>