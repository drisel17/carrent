<?php
    include 'assets/head.php';
    
    $carTrasmission = "";
    $carPrice = "";
    $pickDate = "";
    $dropDate = "";
    $pick_up_location = "";



        if(isset($_GET['car_trasmission'])){
            $carTrasmission = $_GET['car_trasmission'];
        }

        if(isset($_GET['car_price'])){
            $carPrice = $_GET['car_price'];
        }

        if(isset($_GET['pick_up_date'])){
            $pickDate = $_GET['pick_up_date'];
        }

        if(isset($_GET['drop_off_date'])){
            $dropDate = $_GET['drop_off_date'];
        }

        if(isset($_GET['pick_up_city'])){
            $pick_up_location = $_GET['pick_up_city'];
        }


        $result = carSearchQuery($carTrasmission, $carPrice, $pickDate, $dropDate, $pick_up_location,  "Rand()", 12, $carRentalTableName);

?>

    <!-- Breadcrumb End -->
    <div class="breadcrumb-option set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Car Listing</h2>
                        <div class="breadcrumb__links">
                            <a href="./index"><i class="fa fa-home"></i> Home</a>
                            <span>Cars</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Begin -->

    <!-- Car Section Begin -->
    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="car__sidebar">

                        <div class="car__filter">
                            <h5>Car Filter</h5>
                            <form action="car">

                                <p>Pick-up date</p>
                                <input type="date" name="pick_up_date" id="start-date" class="form-control" min = "<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                                <br>
                                <p>Drop-off date</p>
                                <input type="date" name="drop_off_date" id="end-date" class="form-control" min = "<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                                <br>
                                <p>Select trasmission</p>
                                <select name="car_trasmission">
                                    <option data-display="" value="Auto">Auto</option>
                                    <option value="Manual">Manual</option>
                                </select>


                                <p>Select pick-up city</p>
                                <select name="pick_up_city" required>
                                <?php
                                // Loop through the array and create an option for each value
                                foreach ($citiesArray as $value) {
                                    // Output HTML for each option
                                    echo "<option value='$value'>$value</option>";
                                }
                                ?>
                                </select>


                                <div class="filter-price">
                                    <p>Price:</p>
                                    <div class="price-range-wrap">
                                        <div class="filter-price-range"></div>
                                        <div class="range-slider">
                                            <div class="price-input">
                                                <input type="text" name="car_price" id="filterAmount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="car__filter__btn">
                                    <button type="submit" id="submit-button" class="site-btn">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="car__filter__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                            </div>
                            <div class="col-lg-6 col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                       if($result !== false) {
                           while ($row = mysqli_fetch_array($result)){?>
                        <div class="col-lg-4 col-md-4">
                            <div class="car__item">
                                <img src="<?php echo $row['photo_link'];?>" alt="">
                                <div class="car__item__text">
                                    <div class="car__item__text__inner">
                                        <div class="label-date"><?php echo $row['manufacturedDate'];?></div>
                                        <h5><a href="car-details?id=<?php echo $row['id'];?>"><?php echo $row['brandName'];?> <?php echo $row['model'];?></a></h5>
                                        <ul>
                                            <li><span><?php echo $row['mileage'];?></span> km</li>
                                            <li><?php echo $row['trasmission'];?></li>
                                            <li><span><?php echo $row['horsepower'];?></span> hp</li>
                                            <li><span><?php echo $row['city'];?></span></li>


































                                            
                                        </ul>
                                    </div>
                                    <div class="car__item__price">
                                        <span class="car-option sale">For Rent</span>
                                        <h6>$<?php echo $row['price'];?><span>/Day</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>

                    <?php if(!empty($pick_up_location)){?>
                    <h5><a href="car?pick_up_date=<?php echo $pickDate;?>&drop_off_date=<?php echo $dropDate;?>&car_trasmission=<?php echo $carTrasmission;?>&car_price=<?php echo $carPrice;?>" class="text-danger">Show cars from other cities</h5>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Car Section End -->
 

<?php 
    include './assets/footer.php';
?>