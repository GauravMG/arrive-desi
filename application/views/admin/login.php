<?php
$pageTitle = "Login";
?>
<!doctype html>
<html lang="en">

<head>
  <?php include "head-bundle.php"; ?>

</head>

<body>
  <div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
      <div class="h-100">
        <div class="h-100 no-gutters row">
          <div class="d-none d-lg-block col-lg-4">
            <div class="slider-light">
              <div class="slick-slider">
                <div>
                  <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                    <div class="slide-img-bg" style="background-image: url('assets/images/originals/city.jpg');"></div>
                    <div class="slider-content">
                      <h3>Perfect Balance</h3>
                      <p>ArchitectUI is like a dream. Some think it's too good to be true! Extensive collection of unified React Boostrap Components and Elements.
                      </p>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                    <div class="slide-img-bg" style="background-image: url('assets/images/originals/citynights.jpg');"></div>
                    <div class="slider-content">
                      <h3>Scalable, Modular, Consistent</h3>
                      <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components
                      </p>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                    <div class="slide-img-bg" style="background-image: url('assets/images/originals/citydark.jpg');"></div>
                    <div class="slider-content">
                      <h3>Complex, but lightweight</h3>
                      <p>We've included a lot of components that cover almost all use cases for any type of application.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
            <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
              <div class="app-logo"></div>
              <h4 class="mb-0">
                <span class="d-block">Welcome back,</span>
                <span>Please sign in to your account.</span>
              </h4>
              <div class="divider row"></div>
              <div>
                <form id="form" class>
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="position-relative form-group">
                        <label for="email" class>Email</label>
                        <input name="email" id="email" placeholder="" type="email" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="position-relative form-group">
                        <label for="examplePassword" class>Password</label>
                        <input name="password" id="password" placeholder="" type="password" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="position-relative form-check">
                    <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                    <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                  </div> -->
                  <div class="divider row"></div>
                  <div class="d-flex align-items-center">
                    <div class="ml-auto">
                      <!-- <a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a> -->
                      <button class="btn btn-primary btn-lg">Login to Dashboard</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "foot-bundle.php"; ?>

  <script>
    $(document).ready(function() {
      $("#form").on("submit", (e) => {
        e.preventDefault()

        const email = $("#email").val()
        const password = $("#password").val()

        if ((email ?? "").trim() === "") {
          Notiflix.Notify.failure("Please enter a valid email id")
          return false
        }

        if ((password ?? "").trim() === "") {
          Notiflix.Notify.failure("Please enter a valid password")
          return false
        }

        $.ajax({
          url: "<?php echo base_url(); ?>admin/verifyLogin",
          type: "POST",
          data: {
            email,
            password
          },
          success: function(response) {
            const {
              success,
              message
            } = JSON.parse(response)

            if (!success) {
              Notiflix.Notify.failure(message)
              return false
            }

            Notiflix.Notify.success(message)
            setTimeout(() => {
              window.location = "<?php echo base_url(); ?>admin/pgs"
            }, 1500)
          },
          error: function(error) {
            console.log(`error`, error)
            Notiflix.Notify.failure("Something went wrong. Please try again later!")
          }
        });
      })
    })
  </script>

</body>

</html>