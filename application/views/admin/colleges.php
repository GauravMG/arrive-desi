<?php
$pageTitle = "Colleges";
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/tables-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Sep 2023 06:17:46 GMT -->

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
                <div>Colleges</div>
              </div>
              <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                  <button type="button" class="btn-shadow btn btn-info" onclick="onClickAdd()">
                    Add College
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
                    <th>College Name</th>
                    <th>Manage PGs</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="collegesList"></tbody>
                <tfoot>
                  <tr>
                    <th>S. No.</th>
                    <th>College Name</th>
                    <th>Manage PGs</th>
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
      fetchColleges()
    })

    function fetchColleges() {
      $.ajax({
        url: "<?php echo base_url(); ?>admin/fetchColleges",
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
                <td>${data[i].name}</td>
                <td>
                  <div class="list-action-container">
                    <a onclick="onClickManagePG(${data[i].collegeId})">
                      <i class="fa fa-eye"></i>
                    </a>
                  </div>
                </td>
                <td>
                  <div class="list-action-container">
                    <a onclick="onClickEdit(${data[i].collegeId})">
                      <i class="fa fa-edit"></i>
                    </a>
                  </div>
                </td>
              </tr>
            `
          }

          $("#collegesList").html(html)
        },
        error: function(error) {
          console.log(`error`, error)
          Notiflix.Notify.failure("Something went wrong. Please try again later!")
        }
      })
    }

    function onClickAdd() {
      window.location.href = `<?php echo base_url(); ?>admin/college/add`
    }

    function onClickEdit(collegeId) {
      window.location.href = `<?php echo base_url(); ?>admin/college/edit/${collegeId}`
    }

    function onClickDelete(collegeId) {
      console.log(`onClickDelete collegeId`, collegeId)
    }

    function onClickManagePG(collegeId) {
      console.log(`onClickManagePG collegeId`, collegeId)
    }
  </script>

</body>

</html>