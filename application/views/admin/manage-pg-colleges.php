<?php
$pageTitle = "Manage PG Colleges";
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
                <div>Manage Colleges for - <strong><?php echo $pg["name"]; ?></strong></div>
              </div>
            </div>
          </div>
          <div class="main-card mb-3 card">
            <div class="card-body">
              <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>College</th>
                    <th>Distance (in kms)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="dataList"></tbody>
              </table>

              <div style="display: flex; justify-content: space-between;">
                <button class="mt-2 btn btn-primary" onclick="updatePGColleges()">Save</button>
                <button class="mt-2 btn btn-primary" onclick="onClickAdd()">Add More</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "foot-bundle.php"; ?>

  <script>
    var allData = []
    const pg = JSON.parse(`<?php echo json_encode($pg); ?>`)
    const colleges = JSON.parse(`<?php echo json_encode($colleges); ?>`)

    function refreshDataTable() {
      let html = ""

      for (let i = 0; i < allData?.length; i++) {
        html += `
          <tr>
            <td>${i + 1}</td>
            <td>
              <select name="college_${i}" id="college_${i}" onchange="onChangeCollege(${i}, this.value)" class="form-control" required>
                <option>-- Select College --</option>
        `

        for (let j = 0; j < colleges?.length; j++) {
          html += `<option value="${colleges[j]["collegeId"]}" ${colleges[j]["collegeId"] == allData[i]["collegeId"] ? "selected" : ""}>${colleges[j]["name"]}</option>`
        }

        html += `</select>
            </td>
            <td>
              <input name="distance_${i}" id="distance_${i}" value="${allData[i]["distance"] ?? ""}" onchange="onChangeDistance(${i}, this.value)" placeholder="" type="text" class="form-control" required />
            </td>
            <td>
              <div class="list-action-container">
                <a onclick="onClickRemove(${i})">
                  <i class="fa fa-trash"></i>
                </a>
              </div>
            </td>
          </tr>
        `
      }

      $("#dataList").html(html)
    }

    function onChangeCollege(index, value) {
      let newData = []
      for (let i = 0; i < allData?.length; i++) {
        if (i === parseInt(index)) {
          allData[i]["collegeId"] = value
          allData[i]["college"] = colleges?.find((el) => parseInt(el.collegeId) === parseInt(value))

          newData.push(allData[i])
        } else if (parseInt(allData[i]["collegeId"]) === parseInt(value)) {} else {
          newData.push(allData[i])
        }
      }

      allData = newData
      refreshDataTable()
    }

    function onChangeDistance(index, value) {
      for (let i = 0; i < allData?.length; i++) {
        if (i === parseInt(index)) {
          allData[i]["distance"] = value
        }
      }

      refreshDataTable()
    }

    function onClickRemove(index) {
      allData.splice(index, 1)
      refreshDataTable()
    }

    function onClickAdd() {
      allData.push({
        college: null,
        collegeId: null,
        collegePGMappingId: null,
        distance: null,
        pgId: pg["id"]
      })
      refreshDataTable()
    }

    $(document).ready(function() {
      fetchPGColleges()
    })

    function fetchPGColleges() {
      $.ajax({
        url: "<?php echo base_url(); ?>admin/fetchPGColleges",
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

          allData = data
          refreshDataTable()
        },
        error: function(error) {
          console.log(`error`, error)
          Notiflix.Notify.failure("Something went wrong. Please try again later!")
        }
      })
    }

    function updatePGColleges() {
      let collegeMappings = []

      for (let i = 0; i < allData?.length; i++) {
        collegeMappings.push({
          collegeId: allData[i]["collegeId"],
          distance: allData[i]["distance"]
        })
      }

      $.ajax({
        url: "<?php echo base_url(); ?>admin/updatePGColleges",
        method: "POST",
        data: {
          pgId: pg["pgId"],
          collegeMappings
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
        },
        error: function(error) {
          console.log(`error`, error)
          Notiflix.Notify.failure("Something went wrong. Please try again later!")
        }
      })
    }
  </script>

</body>

</html>