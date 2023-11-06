<?php
$pageTitle = "Testimonials";
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
                <div>Testimonials</div>
              </div>
              <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                  <button type="button" class="btn-shadow btn btn-info" onclick="onClickAdd()">
                    Add Testimonial
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="main-card mb-3 card">
            <div class="card-body">
              <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Testimonial Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="dataList"></tbody>
                <tfoot>
                  <tr>
                    <th>S. No.</th>
                    <th>Testimonial Name</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "foot-bundle.php"; ?>

  <script>
    $(document).ready(function() {
      fetchTestimonials()
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

          if (!success) {
            Notiflix.Notify.failure(message)
            return false
          }

          let html = ""

          for (let i = 0; i < data?.length; i++) {
            html += `
              <tr>
                <td>${i + 1}</td>
                <td>${data[i].link}</td>
                <td>
                  <div class="list-action-container">
                    <a onclick="onClickDelete(${data[i].testimonialId})">
                      <i class="fa fa-trash"></i>
                    </a>
                  </div>
                </td>
              </tr>
            `
          }

          $("#dataList").html(html)
        },
        error: function(error) {
          console.log(`error`, error)
          Notiflix.Notify.failure("Something went wrong. Please try again later!")
        }
      })
    }

    function onClickAdd() {
      window.location.href = `<?php echo base_url(); ?>admin/testimonial/add`
    }

    function onClickDelete(testimonialId) {
      window.location.href = `<?php echo base_url(); ?>admin/testimonial/delete/${testimonialId}`
    }
  </script>

</body>

</html>