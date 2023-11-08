<?php
$pageTitle = "Add New Blog";

if (isset($data["blogId"])) {
  $pageTitle = "Edit Blog";
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
                      <label for="title" class>Title</label>
                      <input title="title" id="title" value="<?php echo $data["title"] ?? ""; ?>" placeholder="" type="text" class="form-control" required />
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="position-relative form-group">
                      <label for="coverMedia" class>Cover Photo</label>
                      <input name="file" id="coverMedia" type="file" accept="image/*" class="form-control-file">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="position-relative form-group">
                      <label for="title" class>Content</label>
                      <div id="editor"><?php echo $data["content"] ?? ""; ?></div>
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

  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
  <script>
    const blogId = '<?php echo $data["blogId"] ?? ""; ?>';

    function MinHeightPlugin(editor) {
      this.editor = editor;
    }

    MinHeightPlugin.prototype.init = function() {
      this.editor.ui.view.editable.extendTemplate({
        attributes: {
          style: {
            minHeight: '300px'
          }
        }
      });
    };

    let editor

    ClassicEditor.builtinPlugins.push(MinHeightPlugin);
    ClassicEditor
      .create(document.querySelector('#editor'))
      .then(newEditor => {
        console.log(newEditor);
        editor = newEditor
      })
      .catch(error => {
        console.error(error);
      });
    
    const allowedTypes = ["image/jpg", "image/jpeg"]

    $(document).ready(() => {
      $("#form").on("submit", (e) => {
        e.preventDefault()

        const title = $("#title").val()
        const coverMedia = $("#coverMedia")[0].files[0]
        const content = editor.getData()

        if ((title ?? "").trim() === "") {
          Notiflix.Notify.failure("Please enter a valid title")
          return false
        }

        if (blogId.trim() === "" && !coverMedia) {
          Notiflix.Notify.failure("Please upload a valid cover media")
          return false
        }

        if ((content ?? "").trim() === "") {
          Notiflix.Notify.failure("Please enter a valid content")
          return false
        }

        const formData = new FormData()

        formData.append("title", title)
        if (coverMedia) {
          formData.append("coverMedia", coverMedia)
        }
        formData.append("content", content)

        let url = "<?php echo base_url(); ?>admin/createBlog"

        if (blogId.trim() !== "") {
          url = "<?php echo base_url(); ?>admin/updateBlog"
          formData.append("blogId", blogId)
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
              window.location.href = `<?php echo base_url(); ?>admin/blogs`
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