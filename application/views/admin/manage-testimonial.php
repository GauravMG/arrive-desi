<?php
$pageTitle = "Add New Testimonial";

if (isset($data["testimonialId"])) {
  $pageTitle = "Edit Testimonial";
}
?>
<!doctype html>
<html lang="en">

<head>
  <?php include "head-bundle.php"; ?>

</head>

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <?php include "header.php"; ?>

    <div class="app-main">
      <?php include "sidebar.php"; ?>

      <div class="app-main__outer">
        <div class="app-main__inner">
          <div class="app-page-title">
            <div class="page-title-wrapper">
              <div class="page-title-heading">
                <div><?php echo $pageTitle; ?></div>
              </div>
            </div>
          </div>
          
          <div class="main-card mb-3 card">
            <div class="card-body">
              <form id="form" class>
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="position-relative form-group">
                      <label for="testimonialVideo" class>Testimonial Video</label>
                      <input name="file" id="testimonialVideo" type="file" accept="video/*" class="form-control-file">
                    </div>
                  </div>

                </div>
                
                <button class="mt-2 btn btn-primary">Save</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "foot-bundle.php"; ?>

  <script>
    const allowedTypes = ["video/mp4"]

    $(document).ready(() => {
      $("#form").on("submit", (e) => {
        e.preventDefault()

        const testimonialVideo = $("#testimonialVideo")[0].files[0]

        if (!testimonialVideo) {
          Notiflix.Notify.failure("Please upload a valid testimonial video")
          return false
        }

        const formData = new FormData()

        formData.append("testimonialVideo", testimonialVideo)

        const testimonialId = '<?php echo $data["testimonialId"] ?? ""; ?>';
        let url = "<?php echo base_url(); ?>admin/createTestimonial"
        let data = {
          name
        }

        // if (testimonialId.trim() !== "") {
        //   url = "<?php echo base_url(); ?>admin/updateTestimonial"
        //   data = {
        //     ...data,
        //     testimonialId
        //   }
        // }

        $.ajax({
          url,
          method: "POST",
          data: formData,
          contentType: false,
          cache: false,
          processData: false,
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
              window.location.href = `<?php echo base_url(); ?>admin/testimonials`
            }, 1500)
          },
          error: function(error) {
            console.log(`error`, error)
            Notiflix.Notify.failure("Something went wrong. Please try again later!")
          }
        })
      })
    })
  </script>

</body>

</html>