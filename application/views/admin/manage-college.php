<?php
$pageTitle = "Add New College";

if (isset($data["collegeId"])) {
  $pageTitle = "Edit College";
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
                      <label for="name" class>College Name</label>
                      <input name="name" id="name" value="<?php echo $data["name"] ?? ""; ?>" placeholder="" type="text" class="form-control" required />
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
    $(document).ready(() => {
      $("#form").on("submit", (e) => {
        e.preventDefault()

        const name = $("#name").val()

        if ((name ?? "").trim() === "") {
          Notiflix.Notify.failure("Please enter a valid college name")
          return false
        }

        const collegeId = '<?php echo $data["collegeId"] ?? ""; ?>';
        let url = "<?php echo base_url(); ?>admin/createCollege"
        let data = {
          name
        }

        if (collegeId.trim() !== "") {
          url = "<?php echo base_url(); ?>admin/updateCollege"
          data = {
            ...data,
            collegeId
          }
        }

        $.ajax({
          url,
          method: "POST",
          data,
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
              window.location.href = `<?php echo base_url(); ?>admin/colleges`
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