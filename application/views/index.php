<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "head-bundle.php"; ?>

    <style>
        #searchedColleges {
            list-style-type: none;
            padding: 0;
            margin: 0;
            position: absolute;
            width: 37%;
        }

        #searchedColleges li a {
            border: 1px solid #ddd;
            margin-top: -1px;
            /* Prevent double borders */
            background-color: #f6f6f6;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            color: black;
            display: block;
            cursor: pointer;
        }

        #searchedColleges li a:hover:not(.header) {
            background-color: #eee;
        }
    </style>

</head>

<body>
    <?php include "header.php" ?>

    <!-- hero section  -->
    <section class="hero-sec mb-5">
        <div class="container text-center w-80">
            <div class="row align-items-center hero-sec-row mx-auto">
                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <div class="hero-text text-start mb-5">
                        <h1 class="fw-bolder hero-sec-heading-h1 text-white">
                            <span class="hero-sec-heading-span d-block ">Welcome to</span>
                            Arrive Desi
                        </h1>
                        <h4 class="text-white">Your Ultimate Student Relocation Companion</h4>
                    </div>

                    <div class="input-group mb-3 bg-white py-2 px-3 rounded-pill">
                        <span class="input-group-text"><img src="<?php echo assets_website; ?>images/search-icon.png" alt=""></span>
                        <input id="inputSearchCollege" type="text" class="form-control" placeholder="Colleges" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text"><button id="buttonSearchAccommodationByCollege" onclick="searchAccommodationByCollege()" class="button bg-orange border-0 rounded-pill py-2 text-white px-4">Search</button></span>
                    </div>
                    <ul id="searchedColleges"></ul>

                </div>
                <div class="col col-lg-6 col-sm-12">

                </div>
            </div>
        </div>
    </section>

    <!-- our services sec  -->
    <div class="py-5">
        <div class="container-1 ">
            <div class="row align-items-start">
                <div class="col">
                    <h2 class="text-uppercase text-center blog_heading">Our services</h2>
                    <div class="divider">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-2">
            <div class="row align-items-start">
                <div class="col">
                    <img src="<?php echo assets_website; ?>images/img-3step.png" class="img-3img" alt="..." width="60%" height="auto">
                </div>
            </div>
        </div>
    </div>

    <!-- brands slider -->
    <div class="container container-md container-sm text-center py-5 mt-5 brands-sec">
        <div class="row d-flex flex-column">
            <div class="col">
                <h2 class="blog_heading text-white">Our Trusted Partners</h2>
                <div class="divider"></div>
            </div>

            <div class="col-lg-10 mx-auto mt-5">
                <div class="slider-con">
                    <div class="slider_img mx-4"><img class="w-100" src="<?php echo assets_website; ?>images/partners_img-1.png" alt=""></div>
                    <div class="slider_img mx-4"><img class="w-100" src="<?php echo assets_website; ?>images/partners-img-4.png" alt=""></div>
                    <div class="slider_img mx-4"><img class="w-100" src="<?php echo assets_website; ?>images/partners-img-5.png" alt=""></div>
                    <div class="slider_img mx-4"><img class="w-100" src="<?php echo assets_website; ?>images/partners-img-3.png" alt=""></div>
                    <div class="slider_img mx-4"><img class="w-100" src="<?php echo assets_website; ?>images/partners-img-2.png" alt=""></div>
                    <div class="slider_img mx-4"><img class="w-100" src="<?php echo assets_website; ?>images/partners-img-2.png" alt=""></div>
                    <div class="slider_img mx-4"><img class="w-100" src="<?php echo assets_website; ?>images/partners-img-2.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>

    <!-- video slide sections -->
    <div class="container container-md container-sm text-center py-5 mt-5 videos-sec sub_col">
        <div class="row d-flex flex-column position-relative">
            <div class="col mb-5">
                <h2 class="blog_heading text-white text-start videos-head-text">Testimonial</h2>
            </div>
            <div class="col mt-4">
                <div class="vid-slider-con" id="testimonials">
                </div>

            </div>
        </div>
    </div>

    <!-- we serve section  -->
    <div class="container we-serve-sec py-5">
        <div class="row justify-content-start">
            <div class="col-6">
                <h2 class="blog_heading text-white text-start videos-head-text">WE SERVE<h2>
                        <div class="divider mb-5"></div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> New York</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> New York</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> New York</div>
                        </div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Los Angeles
                            </div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Los Angeles
                            </div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i>Los Angeles
                            </div>
                        </div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Chicago</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Chicago</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Chicago</div>
                        </div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Houston</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Houston</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Houston</div>
                        </div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Phoenix</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Phoenix</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Phoenix</div>
                        </div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Philadelphia
                            </div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Philadelphia
                            </div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Philadelphia
                            </div>
                        </div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Chicago</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Chicago</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Chicago</div>
                        </div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Houston</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Houston</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Houston</div>
                        </div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Phoenix</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Phoenix</div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> Phoenix</div>
                        </div>
                        <div class="container-under">
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> San Antonio
                            </div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> San Antonio
                            </div>
                            <div col-4 class="blrub"><i class="fa fa-map-marker" aria-hidden="true"></i> San Antonio
                            </div>
                        </div>

            </div>
            <div class="col-6">
                <img src="<?php echo assets_website; ?>images/image-girl.png" class="img-3img" alt="..." width="90%" height="auto">

            </div>
        </div>
    </div>

    <!-- create about us section -->
    <!-- <section class="section section-2">
        <div class="section-2-about">
            <div class="section-2-about-right">
                <p class="heading-us">ABOUT US </p>

                <div class="line-about"></div>

                <p class="para">
                    At Arrive Desi, we prioritize your academic success. We <br>
                    go beyond being a service provider and become your<br>
                    academic partner. Our offerings encompass tailored<br> accommodation solutions to make you feel at
                    home, <br>
                    expert guidance in choosing the right school for your <br>
                    academic goals, seamless pre- and post-arrival<br>
                    support, and a wealth of resources designed to<br>
                    empower newcomers on their journey to success.
                </p>
                <div class="col-flex">
                    <div class="left">
                        <p class="check">Relocation Experts</p>
                        <p class="check">Trusted Partnerships</p>
                    </div>
                    <div class="left">
                        <p class="check">Academic Support</p>
                        <p class="check">Success Mission</p>
                    </div>
                </div>
                <button>Explore Now</button>
            </div>
            <div class="section-2-image">
                <img src="./images/About-section.jpg" alt="">
            </div>

        </div>
    </section> -->

    <!-- Exclusive section -->
    <section class="Exclusive my-5">
        <div class="academic">
            <div class="sub-exclusive">
                <img src="./images/Academic.png" alt="">
            </div>
            <div class="exclusive-right">
                <h2 class="exclusive-us">Let's Embark on <br>
                    Your Academic Adventure <br>
                    Together<br>
                </h2>

                <p class="para">
                    Envision a journey where every step you take is a stride toward <br>
                    success. Arrive Desi is your trusted companion on this<br>
                    academic adventure. Let's embark on this exciting path<br> together, making your aspirations a
                    reality.

                </p>
            </div>

        </div>

    </section>

    <!-- mission section  -->
    <section class="mission py-5">
        <div class="mission-content">

            <div class="mission-left">
                <h1>Mission Statement</h1>
                <div></div>
                <p>
                    At Arrive Desi, our mission is to provide<br>
                    international students with a seamless<br>
                    transition into their academic journey. We're<br>
                    not just guiding you; we're walking this path <br>
                    with you, ensuring your success<br>
                    and happiness.


                </p>
            </div>
            <div class="mission-right">
                <h1>Vision Statement</h1>
                <div></div>
                <p>
                    Our vision is to be your trusted friend on your<br>
                    academic journey, guaranteeing your <br>
                    comfort, happiness, and success every step of<br>
                    the way. Your success is our purpose, and<br>
                    together, we'll achieve it.


                </p>

            </div>
        </div>

    </section>

    <!-- blog section  -->
    <div class="container w-100 container-md container-sm text-center sub_col mt-5">
        <div class="row">
            <div class="col">
                <h2 class="blog_heading">Our Latest Blog</h2>
                <div class="divider"></div>
            </div>
        </div>
    </div>

    <!-- blog section -->
    <div id="blog-pg-blog-sec" class="container mt-5 pb-5">
        <div class="row g-5" id="blogs"></div>
    </div>

    <!-- contact form section  -->
    <div class="container container-md container-sm text-center sub_col mt-5">
        <div class="row">
            <div class="col">
                <h2 class="blog_heading">Get in touch with us</h2>
                <div class="divider"></div>
            </div>
        </div>
    </div>

    <div class="container text-center w-100 my-5 pb-5 mb-4 sub_col">
        <div class="row align-items-start">
            <div class="form_col col-lg-7">
                <form class="row g-3" id="home-form">
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
                    <div class="col-12">
                        <!-- <label class="text-start" for="arrivalDate">Arrival Date:</label> -->
                        <input type="date" name="arrivalDate" class="form-control rounded-1" id="inputdate4" placeholder="Enter Your Arrival Date">
                    </div>
                    <div class="col-12 mb-3">
                        <textarea class="form-control rounded-1" id="exampleFormControlTextarea1" rows="5" placeholder="Enter Message"></textarea>
                    </div>
                    <div class="col-12 d-flex">
                        <button type="button" class="form_btn btn btn-lg rounded-0 text-white px-5 py-3 fw-medium ">Explore
                            Now</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-5">
                <div class="side_text">
                    <p class="form_side_text text-start fw-normal lh-sm">For questions, support, and
                        celebrating your 65hievements,
                        don't hesitate to reach out to us via:</p>
                </div>
                <div class="side_details">
                    <div class="detail_1 d-flex align-items-center mb-3">
                        <div class="detail_inner_con">
                            <h6 class="fw-bold text-start">Have any question?</h6>
                            <p class="text-start mb-0"><a href="tel:920209850" class="text-decoration-none text-secondary-emphasis">Free +92 (020)-9850</a>
                            </p>
                        </div>
                    </div>
                    <div class="detail_2  d-flex align-items-center mb-3">
                        <div class="detail_inner_con">
                            <h6 class="fw-bold text-start">Write email</h6>
                            <p class="text-start mb-0"><a href="mailto:needhelp@company.com" class="text-decoration-none text-secondary-emphasis">needhelp@company.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="detail_3 d-flex align-items-center mb-3">
                        <div class="detail_inner_con">
                            <h6 class="fw-bold text-start">Visit anytime</h6>
                            <p class="text-start mb-0"><a href="tel:920209850" class="text-decoration-none text-secondary-emphasis">66 broklyn golden
                                    street.
                                    New York</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <?php include "foot-bundle.php"; ?>

    <script>
        $(document).ready(function() {
            fetchTestimonials()
            fetchBlogs()

            $("#inputSearchCollege").on("input", function() {
                searchColleges(this.value)
            })
        })

        function fetchTestimonials() {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/fetchTestimonials",
                method: "POST",
                data: {},
                success: function(response) {
                    const {
                        success,
                        message,
                        data
                    } = JSON.parse(response)

                    if (success) {
                        let html = ""

                        for (let i = 0; i < data?.length; i++) {
                            if (i >= 3) {
                                break
                            }

                            html += `
                                <div class="slider_vid mx-2 rounded-3 ">
                                    <video width="100%" height="100%" controls="controls" src="<?php echo base_url() . uploads; ?>${data[i].link}">
                                        <source src="<?php echo base_url() . uploads; ?>${data[i].link}" type="video/mp4" />
                                    </video>

                                </div>
                            `
                        }

                        $("#testimonials").html(html)
                    }
                },
                error: function(error) {
                    console.log(`error`, error)
                }
            })
        }

        function fetchBlogs() {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/fetchBlogs",
                method: "POST",
                data: {},
                success: function(response) {
                    const {
                        success,
                        message,
                        data
                    } = JSON.parse(response)

                    if (success) {
                        let html = ""

                        for (let i = 0; i < data?.length; i++) {
                            if (i >= 3) {
                                break
                            }

                            html += `
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="blog-hover-img-zoom card blog_post">
                                        <div class="blog-img overflow-hidden">
                                            <img src="<?php echo base_url() . uploads; ?>${data[i].coverMedia}" class="blog-card-img-top card-img-top" alt="...">
                                            <!-- <div class="logo_img"><img class="w-100 rounded-circle" src="<?php echo assets_website; ?>images/plane_arrow_img.png"
                                                    alt=""></div> -->
                                        </div>
                                        <div class="card-body blog_text">
                                            <div class="blog_title">
                                                <h3 class="card-title">${data[i].title}</h3>
                                            </div>
                                            <div class="blog_peragraph">
                                                <!-- <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus
                                                    labore nobis sed iure consectetur dolor recusandae alias cumque quidem voluptatem?
                                                </p> -->
                                                ${data[i].content}
                                            </div>
                                            <div class="blog_read_btn mt-4">
                                                <button class="w-100 px-2 py-2 border border-0 rounded">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `
                        }

                        $("#blogs").html(html)
                    }
                },
                error: function(error) {
                    console.log(`error`, error)
                }
            })
        }

        function searchColleges(search) {
            if ((search ?? "").trim() === "") {
                $("#searchedColleges").html("")
                return
            }

            $.ajax({
                url: "<?php echo base_url(); ?>admin/fetchColleges",
                method: "POST",
                data: {
                    search
                },
                success: function(response) {
                    const {
                        success,
                        message,
                        data
                    } = JSON.parse(response)

                    if (success) {
                        let html = ""

                        for (let i = 0; i < data?.length; i++) {
                            if (i >= 3) {
                                break
                            }

                            html += `<li><a onclick="onSelectCollege(${data[i].collegeId}, '${data[i].name}')">${data[i].name}</a></li>`
                        }

                        $("#searchedColleges").html(html)
                    }
                },
                error: function(error) {
                    console.log(`error`, error)
                }
            })
        }

        function onSelectCollege(collegeId, collegeName) {
            $("#inputSearchCollege").val(collegeName)
            $("#buttonSearchAccommodationByCollege").attr("collegeId", collegeId)
            $("#searchedColleges").html("")
        }

        function searchAccommodationByCollege() {
            const collegeId = $("#buttonSearchAccommodationByCollege").attr("collegeId")

            if ((collegeId ?? "").trim() === "") {
                Notiflix.Notify.failure("Please search and select a college")
                return false
            }

            window.location.href = `<?php echo base_url(); ?>accommodations?collegeId=${collegeId}`
        }
    </script>

</body>

</html>