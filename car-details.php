<?php 
    include './assets/head.php';
    $id = (int)$_GET["id"];
    $carSql = carInfoSql($carRentalTableName, $id);
    if(!isset($_GET["id"]) || $carSql === 0){
        echo "<script>
                history.back();
              </script>";
    }

    while ($row = mysqli_fetch_array($carSql)){
        $minPickUpDate = new DateTime($row['drop_off_date']);
        $minPickUpDate->modify('+1 day');
        $minPickUpDate = $minPickUpDate->format('Y-m-d');
            if ($minPickUpDate < date('Y-m-d')){

                $minPickUpDate = date('Y-m-d', strtotime('+1 day'));
            }
?>
    <!-- Breadcrumb End -->
    <div class="breadcrumb-option set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php 
                                echo $row['brandName'];
                                echo " "; 
                                echo $row["model"];
                                echo " ";
                                echo $row["manufacturedDate"];
                            ?>
                        </h2>
                        <div class="breadcrumb__links">
                            <a href="./index"><i class="fa fa-home"></i> Home</a>
                            <a href="car">Car Listing</a>
                            <span>
                                <?php 
                                    echo $row['brandName'];
                                    echo " "; 
                                    echo $row["model"];
                                    echo " ";
                                    echo $row["manufacturedDate"];
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Begin -->

    <!-- Car Details Section Begin -->
    <section class="car-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                <div class="car__details__pic">
                    <div class="car__details__pic__large">
                    <img class='car-big-img img-fluid' src='<?php echo $row['photo_link'];?>' alt=''>
                    </div>
                </div>

                    <div class="car__details__tab">
                        <ul class="nav nav-tabs row justify-content-center" role="tablist">
                            <li class="nav-item col-4">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Vehicle
                                    Overview</a>
                            </li>
                            <li class="nav-item col-4">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Vehicle Description</a>
                            </li>
                        </ul>
                        <?php
                        ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="car__details__tab__info">
                                                <br>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-4 col-4 text-center">
                                                        <div class="bold h4">
                                                            <i class="fa-solid fa-door-open text-danger"></i>
                                                        </div>

                                                        <div class="italic h5 text-secondary">
                                                            <?php echo $row['doorsNumber'];?> doors
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-4 text-center">
                                                        <div class="bold h4">
                                                            <i class="fa-solid fa-chair text-danger"></i>
                                                        </div>

                                                        <div class="italic h5 text-secondary">
                                                        <?php echo $row['seatsNumber'];?> seats
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-4 text-center">
                                                        <div class="bold h4">
                                                            <i class="fa-solid fa-gear text-danger"></i>
                                                        </div>

                                                        <div class="italic h5 text-secondary">
                                                        <?php echo $row['trasmission'];?> trasmission
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                <hr>

                                                <br>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-3 col-6 text-center">
                                                        <div class="bold h5">
                                                            Brand
                                                        </div>

                                                        <div class="italic h6 text-danger">
                                                            <?php echo $row['brandName'];?>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-6 text-center">
                                                        <div class="bold h5">
                                                            Model
                                                        </div>

                                                        <div class="italic h6 text-danger">
                                                            <?php echo $row['model'];?>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-6 text-center">
                                                        <div class="bold h5">
                                                            Year
                                                        </div>

                                                        <div class="italic h6 text-danger">
                                                            <?php echo $row['manufacturedDate'];?>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-6 text-center">
                                                        <div class="bold h5">
                                                            Mileage
                                                        </div>

                                                        <div class="italic h6 text-danger">
                                                            <?php echo $row['mileage'];?> km
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-6 text-center">
                                                        <div class="bold h5">
                                                            Horsepower
                                                        </div>

                                                        <div class="italic h6 text-danger">
                                                            <?php echo $row['horsepower'];?>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-6 text-center">
                                                        <div class="bold h5">
                                                            Trasmission
                                                        </div>

                                                        <div class="italic h6 text-danger">
                                                            <?php echo $row['trasmission'];?>
                                                        </div>
                                                    </div>

                                                </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="car__details__tab__info">
                                    <div class="row">
                                        <p class="text-secondary">
                                            <?php echo $row['description'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <form id="payment-form">
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__payment">
                        <div class="h5">Price per day: <span class="text-success" id="price-per-day">$<?php echo $row['price']; ?></span></div>
                        <div class="select-list">
                            <div class="select-list-item">
                                <p>Pick-up date</p>
                                <input type="date" name="pick_up_date" id="start-date" class="form-control" min="<?php echo $minPickUpDate;?>" required>
                            </div>
                            <br>
                            <div class="select-list-item">
                                <p>Drop-off date</p>
                                <input type="date" name="drop_off_date" id="end-date" class="form-control" min="" required>
                            </div>
                            <br>
                            <div class="select-list-item">
                                <p>Pick-up city</p>
                                <p class="text-success"><?php echo $row['city'];?></p>
                            </div>
                            <br>
                            <br>
                            <div class="h5">Total price: <span class="text-success" id="total-price">$ 0</span></div>
                        </div>
                                                <br>
                                            </div>

                                            <button type="button" class="btn btn-primary" id="submit-button">Pay Now</button> 

                                        </div>


                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car Details Section End -->
    
<?php 
    }
    include './assets/footer.php';
?>