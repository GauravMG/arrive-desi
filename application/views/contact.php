<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "head-bundle.php"; ?>

</head>

<body>
    <?php include "header.php" ?>

    <!-- hero section  -->
    <div class="container-fluid contact-hero-sec-bg text-center py-5 ">
        <div class="row py-5 my-5">
            <div class="col mb-5">
                <h1 class="text-white hero-sec-head">Contact Us</h1>
            </div>
        </div>
    </div>

    <!-- info cards  -->
    <div id="contact-infor-card" class="container text-center">
        <!-- <div class="container"> -->
        <div class="row g-3">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card text-center shadow-lg rounded-4">
                    <div class="card-body py-5">
                        <img class="mb-3 rounded-circle" style="width: 65px;" src="images/emailing.png" alt="">
                        <h5 class="card-title">Email</h5>
                        <a href="mailto:needhelp@company.com" class="card-text text-decoration-none text-dark">needhelp@company.com</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card text-center shadow-lg rounded-4">
                    <div class="card-body py-5">
                        <img class="mb-3 rounded-circle" style="width: 65px;" src="images/location .png" alt="">
                        <h5 class="card-title">Address</h5>
                        <a href="#" class="card-text text-decoration-none text-dark">88
                            Broklyn Golden Street. Canada</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card text-center shadow-lg rounded-4">
                    <div class="card-body py-5">
                        <img class="mb-3 rounded-circle" style="width: 65px;" src="images/tel.png" alt="">
                        <h5 class="card-title">Phone</h5>
                        <a href="tel:+920209850" class="card-text text-decoration-none text-dark">+92 (020)-9850</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>

    <!-- title text -->
    <div class="container w-100 container-md container-sm text-center sub_col pt-5 mt-3">
        <div class="row">
            <div class="col">
                <h2 class="blog_heading">Get In Touch With Us</h2>
                <div class="divider"></div>
            </div>
        </div>
    </div>

    <!-- form -->
    <div id="contact-form-con" class="container mt-5 pb-5">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-sm-12">
                <form class="row g-3" id="contact-form">
                    <div class="col-md-6">
                        <input type="text" class="form-control rounded-1" id="inputname4" placeholder="Enter Name">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control rounded-1" id="inputemail4" placeholder="Enter Email">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control rounded-1" id="inputsubject4" placeholder="Enter University">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control rounded-1" id="inputemail4" placeholder="Enter Phone">
                    </div>
                    <div class="col-12 mb-3">
                        <textarea class="form-control rounded-1" id="exampleFormControlTextarea1" rows="5" placeholder="Enter Message"></textarea>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="form_btn btn btn-lg rounded-0 text-white px-5 py-3 fw-medium ">Explore
                            Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <?php include "foot-bundle.php"; ?>

</body>

</html>