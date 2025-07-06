
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinaHotel_Facilities</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <style>
        .pop:hover{
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
        .swiper {
            width: 100%;
            height: auto;
        }

        .swiper-slide {
             padding: 0 10px;
        }
    </style>
</head>
<body class="bg-light">

<!--Facilities-->
 <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h1">Facilities</h2> 
  <div class="container shadow ">
    <div class="swiper swiper-testomonial">
        <div class="swiper-wrapper mb-5">
            <?php
                $facilities_r=selectAll('facilities');
                    $path=ABOUT_IMG_PATH;
                        while($row=mysqli_fetch_assoc($facilities_r)){
                            echo<<<data
                                <div class="swiper-slide p-2" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                                    <div class="w-100" style="max-width: 2000px;">
                                        <div style="width: 100%; height: 250px; overflow: hidden;" class="mb-2 shadow rounded">
                                             <img src="$path{$row['picture']}" class="w-100 h-100" style="object-fit: contain;">
                                        </div>
                                        <h2 class="text-center mt-3">$row[name]</h2>
                                        <p class="text-center px-3">$row[description]</p>
                                    </div>
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


    <!--Features-->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Features</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br> Ex iure natus quasi distinctio rerum magni sapiente. Quasi iusto libero nisi.</p>
    </div>
    <div class="container">
        <div class="row">
             <?php
                    $feature_r=selectAll('features');
                    $path=ABOUT_IMG_PATH;
                    while($row=mysqli_fetch_assoc($feature_r)){
                        echo<<<data
                                <div class="col-lg-4 col-mg-6 mb-5 px-4">
                                        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                                            <div class="d-flex align-items-center">
                                                <img src="$path$row[picture]" width="40px">
                                                    <h5 class="m-0 ms-2">$row[name]</h5>           
                                            </div>
                                            <p>$row[description]</p>
                                        </div>     
                                </div>
                            data;
                            }
                        ?>
                    
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 6000, // 3 seconds
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
</body>
</html>