<?php
$pageTitle = "Add New PG";

if (isset($data["pgId"])) {
  $pageTitle = "Edit PG";
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
                      <label for="name" class>PG Name</label>
                      <input name="name" id="name" value="<?php echo $data["name"] ?? ""; ?>" placeholder="" type="text" class="form-control" required />
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="position-relative form-group">
                      <label for="aboutPG" class>About PG</label>
                      <textarea name="aboutPG" id="aboutPG" rows="5" class="form-control"><?php echo $data["aboutPG"] ?? ""; ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="position-relative form-group">
                      <label for="openingTime" class>PG Opening Time</label>
                      <input type="text" name="openingTime" id="openingTime" value="<?php echo $data["openingTime"] ?? ""; ?>" class="form-control timepicker" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="position-relative form-group">
                      <label for="closingTime" class>PG Closing Time</label>
                      <input type="text" name="closingTime" id="closingTime" value="<?php echo $data["closingTime"] ?? ""; ?>" class="form-control timepicker" />
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="position-relative form-group">
                      <label for="meals" class>Meals</label>
                      <textarea name="meals" id="meals" rows="3" class="form-control"><?php echo $data["meals"] ?? ""; ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="position-relative form-group">
                      <label for="accomodationsAvailable" class>Accomodations Available</label>
                      <textarea name="accomodationsAvailable" id="accomodationsAvailable" rows="3" class="form-control"><?php echo $data["accomodationsAvailable"] ?? ""; ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="position-relative form-group">
                      <label for="beforeArrivalStudentGuide" class>Before Arrival Student Guide</label>
                      <input name="file" id="beforeArrivalStudentGuide" type="file" accept="application/pdf" class="form-control-file">
                      <small class="form-text text-muted">Please upload PDF of to do details before arrival for student
                      </small>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="position-relative form-group">
                      <label for="afterArrivalStudentGuide" class>After Arrival Student Guide</label>
                      <input name="file" id="afterArrivalStudentGuide" type="file" accept="application/pdf" class="form-control-file">
                      <small class="form-text text-muted">Please upload PDF of to do details after arrival for student
                      </small>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="position-relative form-group">
                      <label for="rulesAndRegulations" class>Rules and Regulations</label>
                      <input name="file" id="rulesAndRegulations" type="file" accept="application/pdf" class="form-control-file">
                      <small class="form-text text-muted">Please upload PDF of Rules and Regulations and other details
                      </small>
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
    const allowedTypes = ["application/pdf"]

    $(document).ready(() => {
      $('.timepicker').timepicker({
        timeFormat: 'hh:mm p',
        interval: 60,
        minTime: '0',
        maxTime: '11:59pm',
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });

      $("#form").on("submit", (e) => {
        e.preventDefault()

        const name = $("#name").val()
        const aboutPG = $("#aboutPG").val()
        const openingTime = $("#openingTime").val()
        const closingTime = $("#closingTime").val()
        const meals = $("#meals").val()
        const accomodationsAvailable = $("#accomodationsAvailable").val()
        const beforeArrivalStudentGuide = $("#beforeArrivalStudentGuide")[0].files[0]
        const afterArrivalStudentGuide = $("#afterArrivalStudentGuide")[0].files[0]
        const rulesAndRegulations = $("#rulesAndRegulations")[0].files[0]

        if ((name ?? "").trim() === "") {
          Notiflix.Notify.failure("Please enter a valid pg name")
          return false
        }

        if (beforeArrivalStudentGuide && allowedTypes.indexOf(beforeArrivalStudentGuide.type) < 0) {
          Notiflix.Notify.failure("Please upload a valid PDF file for before arrival student guide")
          return false
        }

        if (afterArrivalStudentGuide && allowedTypes.indexOf(afterArrivalStudentGuide.type) < 0) {
          Notiflix.Notify.failure("Please upload a valid PDF file for after arrival student guide")
          return false
        }

        if (rulesAndRegulations && allowedTypes.indexOf(rulesAndRegulations.type) < 0) {
          Notiflix.Notify.failure("Please upload a valid PDF file for rules and regulations")
          return false
        }

        const formData = new FormData()

        formData.append("name", name)
        formData.append("aboutPG", aboutPG)
        formData.append("openingTime", openingTime)
        formData.append("closingTime", closingTime)
        formData.append("meals", meals)
        formData.append("accomodationsAvailable", accomodationsAvailable)
        formData.append("beforeArrivalStudentGuide", beforeArrivalStudentGuide)
        formData.append("afterArrivalStudentGuide", afterArrivalStudentGuide)
        formData.append("rulesAndRegulations", rulesAndRegulations)

        const pgId = '<?php echo $data["pgId"] ?? ""; ?>';
        let url = "<?php echo base_url(); ?>admin/createPG"

        if (pgId.trim() !== "") {
          url = "<?php echo base_url(); ?>admin/updatePG"
          formData.append("pgId", pgId)
        }

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
              window.location.href = `<?php echo base_url(); ?>admin/pgs`
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