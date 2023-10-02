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
                <div class="page-title-icon">
                  <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                </div>
                <div>Colleges
                </div>
              </div>
              <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                  <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                      <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Buttons
                  </button>
                  <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link">
                          <i class="nav-link-icon lnr-inbox"></i>
                          <span> Inbox</span>
                          <div class="ml-auto badge badge-pill badge-secondary">86</div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">
                          <i class="nav-link-icon lnr-book"></i>
                          <span> Book</span>
                          <div class="ml-auto badge badge-pill badge-danger">5</div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">
                          <i class="nav-link-icon lnr-picture"></i>
                          <span> Picture</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a disabled class="nav-link disabled">
                          <i class="nav-link-icon lnr-file-empty"></i>
                          <span> File Disabled</span>
                        </a>
                      </li>
                    </ul>
                  </div>
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
    $(document).ready(function () {
      fetchColleges()
    })

    function fetchColleges() {
      $.ajax({
        url: "<?php echo base_url(); ?>admin/fetchColleges",
        method: "POST",
        data: {},
        success: function(response) {
          const {success, message, data} = JSON.parse(response)

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
                    <a onclick="onClickDelete(${data[i].collegeId})">
                      <i class="fa fa-trash"></i>
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

    function onClickEdit(collegeId) {
      console.log(`onClickEdit collegeId`, collegeId)
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