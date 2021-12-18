<?php 
  $title = "Sports Warehouse";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <div id="slideshow" class="loading slideshow desktop">
    <ul class="bxslider">
      <li>
        <img src="images/slide1.png" alt="Balls" title="Balls">
        <div class="overlay">
          <p>View our brand new range of</p>
          <p>Sports balls</p>
          <a class="shop-now" href="browseCategory.php?categoryId=5">
            <button>Shop Now</button>
          </a>
        </div>
      </li>
      <li>
        <img src="images/slide2.png" alt="Helmets" title="Helmets">
        <div class="overlay">
          <p>View our brand new range of</p>
          <p>Helmets</p>
          <a class="shop-now" href="browseCategory.php?categoryId=2">
            <button>Shop Now</button>
          </a>
        </div>
      </li>
      <li>
        <img src="images/slide3.png" alt="Shoes" title="Shoes">
        <div class="overlay">
          <p>View our brand new range of</p>
          <p>Shoes</p>
          <a class="shop-now" href="browseCategory.php?categoryId=1">
            <button>Shop Now</button>
          </a>
        </div>
      </li>
    </ul>
  </div>
  
  <main class="featured">
    <div class="section-heading-container">
      <h2 class="section-heading">Featured Products</h2>
    </div>
    <ul class="featured-products">
      <?php foreach ($itemRows as $row):
        $photo = "./images/".$row["photo"];
        $itemName = $row["itemName"];
        $price = $row["price"];
        $salePrice = $row["salePrice"];
        $description = $row["description"];
        $itemId = $row["itemId"];
  
        ?>
        <?php if($salePrice > 0): ?>
          <li class="product">
            <a href="viewSingleProduct.html.php">
              <img src="<?= $photo ?>" alt="<?= $description ?>">
              <p class="price sale">$<?= $salePrice ?></p>
              <p class="full-price">WAS $<span><?= $price ?></span></p>
              <p class="product-name"><?= $itemName ?></p>
            </a>
          </li>
        <?php endif; ?>
        <?php if($salePrice == 0): ?>
          <li class="product">
            <a href="viewSingleProduct.html.php">
              <img src="<?= $photo ?>" alt="<?= $description ?>">
              <p class="price">$<?= $price ?></p>
              <p class="product-name"><?= $itemName ?></p>
            </a>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
  </main>
  
  <div class="partnerships">
    <div class="section-heading-container">
      <h2 class="section-heading">Our brands and partnerships</h2>
    </div>
    <div class="partnerships-content-container">
      <p>These are some of our top brands and partnerships.
        <span>The best of the best is here.</span>
      </p>
      <div class="brand-logos-container">
        <div class="brand-logos">
          <img class="mobile" src="./images/brands-mobile.jpg" alt="Partner Brands">
          <img class="desktop" src="./images/brands-desktop.png" alt="Partner Brands">
        </div>
      </div>
    </div>
  </div>
</body>
</html>