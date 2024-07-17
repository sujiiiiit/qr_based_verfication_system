$("#custom-file-input").click(function () {
  $("#fileToUpload").click();
});
$("#fileToUpload").change(function () {
  $("#file-upload-form").submit();
});

$("#file-upload-form").submit(function (e) {
  e.preventDefault();
  handleFileUpload();
});


let dropZone = $(".drop-zone");
let dragCounter = 0;

$(document).on("dragenter", function (e) {
  dragCounter++;
  dropZone.show();
});

$(document).on("dragleave", function (e) {
  dragCounter--;
  if (dragCounter === 0) {
    dropZone.hide();
  }
});

dropZone.on("dragover", function (e) {
  e.preventDefault();
});

dropZone.on("drop", function (e) {
  e.preventDefault();
  dropZone.hide();
  $("#fileToUpload").prop("files", e.originalEvent.dataTransfer.files);
  handleFileUpload();
});

function handleFileUpload() {
  let formData = new FormData($("#file-upload-form")[0]);
  $.ajax({
    url: "upload.php",
    type: "POST",
    data: formData,
    success: function (response) {
      alert(response);
    },
    cache: false,
    contentType: false,
    processData: false,
  });
}
