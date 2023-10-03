<?php
$pageTitle = "PGs";
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
                <div>PGs</div>
              </div>
              <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                  <button type="button" class="btn-shadow btn btn-info" onclick="onClickAdd()">
                    Add PG
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
                    <th>PG Name</th>
                    <th>Manage Colleges</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="dataList"></tbody>
                <tfoot>
                  <tr>
                    <th>S. No.</th>
                    <th>PG Name</th>
                    <th>Manage Colleges</th>
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
      fetchPGs()
    })

    function fetchPGs() {
      $.ajax({
        url: "<?php echo base_url(); ?>admin/fetchPGs",
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
                    <a onclick="onClickManageColleges(${data[i].pgId})">
                      <i class="fa fa-eye"></i>
                    </a>
                  </div>
                </td>
                <td>
                  <div class="list-action-container">
                    <a onclick="onClickEdit(${data[i].pgId})">
                      <i class="fa fa-edit"></i>
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
      window.location.href = `<?php echo base_url(); ?>admin/pg/add`
    }

    function onClickEdit(pgId) {
      window.location.href = `<?php echo base_url(); ?>admin/pg/edit/${pgId}`
    }

    function onClickManageColleges(pgId) {
      window.location.href = `<?php echo base_url(); ?>admin/pg/manage-colleges/${pgId}`
    }
  </script>

</body>

</html>