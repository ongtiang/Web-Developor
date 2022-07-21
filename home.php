<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color: #C7F9FA;">
   
<?php include 'components/user_header.php'; ?>



<section>

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/rog strix sample.jpg" style="width: 100%;max-width: 1200px; height: auto;" >
         </div>
         <div class="content">
            <span style="font-size: 18px;">UP TO 20% off</span>
            <h3 style="font-size: 27px;">ROG STRIX 2022</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/alienware sample.jpg" style="width: 100%;max-width: 1200px; height: auto;" >
         </div>
         <div class="content">
            <span style="font-size:18px">UP TO 30% off</span>
            <h3 style="font-size: 27px;">ALIENWARE X14</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/legion sample.jpg"  style="width: 100%;max-width: 1200px; height: auto;">
         </div>
         <div class="content">
            <span style="font-size: 18px;">UP TO 15% off</span>
            <h3 style="font-size: 27px;">LENOVO LEGION 7</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

   </div>
</div>

      <div class="swiper-pagination"></div>

   </div>


</section>

</div>

<section class="category" style="background-color: #79FDFF;">

   <h1 class="heading">below are the brand we sell</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="shop.php" class="swiper-slide slide">
      <img src="images/rog.jpg" alt="ASUS ROG" style="border-radius: 50%;">
      <h3>ASUS ROG</h3>
   </a>

   <a href="shop.php" class="swiper-slide slide">
      <img src="images/omen.png" alt="HP OMEN" style="border-radius:50%;">
      <h3>HP OMEN</h3>
   </a>

   <a href="shop.php" class="swiper-slide slide">
      <img src="images/legion.jpg" alt="LENOVO LEGION" style="border-radius:50%;">
      <h3>LENOVO LEGION</h3>
   </a>

   <a href="shop.php" class="swiper-slide slide">
      <img src="images/alienware.png" alt="DELL ALIENWWARE" style="border-radius:50%;">
      <h3>ALIENWARE</h3>
   </a>

   <a href="shop.php" class="swiper-slide slide">
      <img src="images/tuf.png" alt="ASUS TUF" style="border-radius:50%;">
      <h3>ASUS TUF</h3>
   </a>

   <a href="shop.php" class="swiper-slide slide">
      <img src="images/asus.png" alt="ASUS" style="border-radius:50%;">
      <h3>ASUS</h3>
   </a>

   <a href="shop.php" class="swiper-slide slide">
      <img src="images/dell.jpg" alt="DELL" style="border-radius:50%;">
      <h3>DELL</h3>
   </a>

   <a href="shop.php" class="swiper-slide slide">
      <img src="images/hp.jpg" alt="HP" style="border-radius:50%;">
      <h3>HP</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products" style="background-color: #79FDFF;">

   <h1 class="heading">our products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist" style="color: red;"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye" style="color: #831800;"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>RM </span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart" >
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>