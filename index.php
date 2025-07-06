<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinaHotel_Home</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
   <link rel="stylesheet" href="style.css">
    <!--for about section-->
    
</head>
<body class="bg-light">
 <?php require('inc/header.php');?>

 <!-- Swiper -->
  <div class="container-fluid">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                 <?php
                            $about_r=selectAll('carousel_image');
                            $path=ABOUT_IMG_PATH;
                            while($row=mysqli_fetch_assoc($about_r)){
                                echo<<<data
                                        <div class="swiper-slide">
                                            <img src="$path$row[picture]" class="w-100 h-20 d-block"/>
                                        </div>
                                data;
                            }
                        ?>
                
            </div>
        
        </div>
  </div>
<!-- check availability-->
 <div class="container availability-form">
    <div class="row">
        <div class="col bg-white p-4 rounded">
            <h4 class="">Check Booking Availability</h4>

            <form>
                <div class="row">
                    <div class="col-lg-3">
                        <label  class="form-label" style="font-weight: 500;">Check-In </label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3">
                        <label  class="form-label" style="font-weight: 500;">Check-Out </label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3">
                        <label  class="form-label" style="font-weight: 500;">Adult </label>
                        <select class="form-select shadow-none" >
                            <option selected>None</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="Above">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label  class="form-label" style="font-weight: 500;">Children </label>
                        <select class="form-select shadow-none" >
                            <option selected>None</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="Above">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn text-white shadow-none custom-bg " style="font-weight: bolder;">Submit</button>
                    </div>
                </div>
            </form>
          
        </div>
    </div>
 </div>
 
 <?php require('rooms.php');?>
 
<!--Facility-->

 <?php require('facilities.php');?>

<!--Testomonials-->
 <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h1">Testomonials</h2> 
  <div class="container">
    <div class="swiper swiper-testomonial">
        <div class="swiper-wrapper mb-5">
            <?php
                $testomonial_r=selectAll('testomonial');
                    $path=ABOUT_IMG_PATH;
                        while($row=mysqli_fetch_assoc($testomonial_r)){
                            echo<<<data
                                    <div class="swiper-slide bg-white p-4">
                                        <div class="profile d-flex align-items-center p-4">
                                            <img src="$path$row[picture]" width="70px">
                                            <h4 class="m-0 ms-0 p-2">$row[name]</h4>
                                        </div>
                                        <p class="">$row[description]</p>
                                        <span>
                                            <i class="bi bi-star-fill text-warning" ></i>
                                            <i class="bi bi-star-fill text-warning" ></i>
                                            <i class="bi bi-star-fill text-warning" ></i>
                                            <i class="bi bi-star-fill text-warning" ></i>
                                        </span>
                                    </div> 
                                data;
                        }
            ?>       
        </div>
        
    <div class="swiper-pagination"></div>
  </div>
  <div class="col-lg-12 text-center mt-5">
    <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Details->>></a>
</div>
</div>


<?php require('about.php');?>

<!--About section-->
<div class="my-5 px-4" id="about">
        <h2 class="fw-bold h-font text-center">About</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br> Ex iure natus quasi distinctio rerum magni sapiente. Quasi iusto libero nisi.</p>
    </div>


    <div class="container">
        <div class="row jsutify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2 ">
                 <h3 class="mb-3">Lorem, ipsum dolor.</h3>   
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et corporis modi qui!
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Et corporis modi qui!
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Et corporis modi qui!
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Et corporis modi qui!
                 </p>     
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="images/testomonials/shanjoy.jpg" class="w-100">
            </div>        
        </div>
    </div>

 <div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white shadow p-4 rounded border-top border-4 text-center box">
                <img src="images/icons/hotel.svg" width="70px">
                <h4>100+  Rooms</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white shadow p-4 rounded border-top border-4 text-center box">
                <img src="images/icons/customar.svg" width="70px">
                <h4>250+ Customar</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white shadow p-4 rounded border-top border-4 text-center box">
                <img src="images/icons/rating.svg" width="70px">
                <h4>200+ Reviews</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white shadow p-4 rounded border-top border-4 text-center box">
                <img src="images/icons/employ.svg" width="70px">
                <h4>100+ Employes</h4>
            </div>
        </div>
    </div>
</div>
    <!--Management Team-->
 



<!--contact us-->
<?php
    $contact_q="SELECT * FROM `contact_details` WHERE `serial_no`=?";
    $values=[1];
    $contact_r=mysqli_fetch_assoc(select($contact_q,$values,'i'));
    
?>
<div class="my-5 px-4" id="contact">
        <h2 class="fw-bold h-font text-center">Contact Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br> Ex iure natus quasi distinctio rerum magni sapiente. Quasi iusto libero nisi.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-mg-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4">
                        
                        <iframe class="w-100 rounded" height="350" src="<?php echo $contact_r['ifram'] ?>" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>          
                        <h5>Address</h5>
                        <a href="<?php echo $contact_r['address'] ?>" target="blank" class="text-decoration-none">
                            <i class="bi bi-geo-alt-fill"></i><?php echo $contact_r['address'] ?>
                        </a>
                        <h5 class="mt-4">Call Us</h5>
                            <a href="tel: +<?php echo $contact_r['phn1'] ?>" class="d-inline-blcok mb-2 text-decoration-none text-dark"></a>
                            <i class="bi bi-telephone-fill"></i>+<?php echo $contact_r['phn1'] ?> <br>
                            <?php
                                if($contact_r['phn2']!=''){
                                    echo<<<data
                                        <a href="tel: +$contact_r[phn2]" class="d-inline-blcok mb-2 text-decoration-none text-dark"></a>
                                        <i class="bi bi-telephone-fill"></i>+$contact_r[phn2]
                                    data;
                                }
                            ?>

                        <h5 class="mt-4">Email Us</h5>
                            <a href="mailto: <?php echo $contact_r['email'] ?>" class="d-inline-blcok mb-2 text-decoration-none text-dark"></a>
                            <i class="bi bi-envelope"></i><?php echo $contact_r['email'] ?>
                        
                         <h5 class="mt-4">Follow Us</h5>
                                 <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block  text-dark fs-6 me-2" >
                                     <i class="bi bi-facebook me-2"></i>
                                 </a>
                                 <a href="<?php echo $contact_r['twitter'] ?>" class="d-inline-block  text-dark fs-6 me-2" >
                                     <i class="bi bi-twitter me-2"></i>
                                 </a>
                                 <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark fs-6 me-2" >
                                     <i class="bi bi-instagram me-2"></i>
                                 </a>                
                                
                            
                       
                </div>     
            </div>
            <div class="col-lg-6 col-mg-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4">
                        <form method="POST">
                            <h5>Send a message</h5>
                            <div class="mt-3">
                                <label  class="form-label">Name</label>
                                 <input name="name" required type="text" class="form-control shadow-none">
                            </div>
                            <div class="mt-3">
                                <label  class="form-label">Email</label>
                                 <input name="email" required type="email" class="form-control shadow-none">
                            </div>
                            <div class="mt-3">
                                <label  class="form-label">Subject</label>
                                 <input name="subject" required type="text" class="form-control shadow-none">
                            </div>
                            <div class="mt-3">
                                <label  class="form-label">Message</label>
                                 <textarea name="message" required  class="form-control shadow-none" rows="5"></textarea>
                            </div>
                            <button type="submit" name="send" class="btn btn-dark shadow-none mt-3">Send</button>
                        </form>
                     </div>     
            </div>
        </div>
</div>
<?php
    if(isset($_POST['send'])){
        $frm_data=filteration($_POST);
        $q="INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
        $values= [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];
        $result= insert($q,$values,'ssss');
        if($result==1){
            alert('success','Sent your message');
        }
        else{
            alert('error','Do not send message');
        }
        
    }

?>

 
 <?php require('inc/footer.php');?>

    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop:true,
        autoplay:{
            delay:3500,
            disableOnInteraction: false
        }
        });
        var swiper = new Swiper(".swiper-testomonial", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView:"3",
            loop: true, 
            coverflowEffect: {
              rotate: 50,
              stretch: 0,
              depth: 100,
              modifier: 1,
              slideShadows: false,
            },
            pagination: {
              el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
          });
  </script>

        <!--for about section-->
        <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 40,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
                320: {
                    slidesPerView: 2,
                },
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
            }
    });
  </script>
</body>
</html>