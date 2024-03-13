<?php
    include 'assets/head.php';
?>

    <!-- Hero Section Begin -->
    <?php
    $result = mysqli_query($conn, "SELECT * FROM $carRentalTableName WHERE drop_off_date < CURDATE() ORDER by Rand() LIMIT 1");
    while($row = mysqli_fetch_array($result)){?>
    <section class="hero spad set-bg" data-setbg="<?php echo $row['photo_link'];?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero__text">
                        <div class="hero__text__title">
                            <span>FIND YOUR DREAM CAR</span>
                            <h2 class="text-danger"><?php echo $row['brandName'];?> <?php echo $row['model'];?></h2>
                        </div>
                        <div class="hero__text__price">
                            <div class="car-model text-danger"><?php echo $row['manufacturedDate'];?></div>
                            <h2 class="text-danger">$<?php echo $row['price'];?><span>/Day</span></h2>
                        </div>
                        <a href="car-details?id=<?php echo $row['id'];?>" class="primary-btn more-btn text-danger">Learn More</a>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-lg-5">
                    <div class="hero__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Car Rental</a>
                            </li>

                            <!-- CAR BUY LSIT
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Buy Car</a>
                            </li>
                            CAR BUY LIST END-->

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="hero__tab__form">
                                    <h2>Find Your Car</h2>
                                    <form action="car">
                                        <div class="select-list">
                                            <div class="select-list-item">
                                                <p>Pick-up date</p>
                                                <input type="date" name="pick_up_date" id="start-date" class="form-control" min = "<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Drop-off date</p>
                                                <input type="date" name="drop_off_date" id="end-date" class="form-control" min = "<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select Trasmission</p>
                                                <select name="car_trasmission" required>
                                                    <option data-display="" value="Auto">Auto</option>
                                                    <option value="Manual">Manual</option>
                                                </select>
                                            </div>

                                            <div class="select-list-item">
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
                                            </div>


                                        </div>
                                        <div class="car-price">
                                            <p>Price Range:</p>
                                            <div class="price-range-wrap">
                                                <div class="price-range"></div>
                                                <div class="range-slider">
                                                    <div class="price-input">
                                                        <input type="text" name="car_price" id="amount" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="submit-button" class="site-btn">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- Car Section Begin -->
    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Cars</span>
                        <h2>Best Vehicle Offers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $result = carSearchQuery("", "", "", "", "",  "Rand()", 4, $carRentalTableName);
                    if($result !== false) {
                        while ($row = mysqli_fetch_array($result)){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix">
                    <a href="car-details?id=<?php echo $row['id'];?>" class="car__item">
                    <img src='<?php echo $row['photo_link'];?>' class='card-img-top' alt=''>
                        <div class="car__item__text">
                            <div class="car__item__text__inner">
                                <div class="label-date"><?php echo $row['manufacturedDate'];?></div>
                                <h5><?php echo $row['brandName'];?> <?php echo $row['model'];?></h5>
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
                        </a>
                </div>
                <?php 
                        }
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Car Section End -->
  
<?php 
    include './assets/footer.php';
?>