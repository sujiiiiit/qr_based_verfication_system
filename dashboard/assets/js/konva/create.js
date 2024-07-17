var stage = new Konva.Stage({
  container: "canvaspart",
  width: 400,
  height: 225,
  background: "#fff",
});
var layer = new Konva.Layer();
stage.add(layer);

// Add a button to export the image
var exportButton = document.getElementById("exportbtn");

exportButton.addEventListener("click", function () {
  stage.toDataURL({
    mimeType: "image/png",
    quality: 1,
    callback: function (dataUrl) {
      var link = document.createElement("a");
      link.download = "stage.png";
      link.href = dataUrl;
      link.click();
    },
  });
});
var exportjsonButton = document.getElementById("exportjsonbtn");

exportjsonButton.addEventListener("click", function () {
  // Get all images in the stage
  var images = stage.find("Image");

  // Create an array to store the base64 strings of the images
  var imageSources = [];

  // Convert each image to base64 and add it to the array
  images.forEach(function (image) {
    var source = image.attrs.image.src;
    var imageObj = new Image();
    imageObj.crossOrigin = "Anonymous";
    imageObj.src = source;
    imageObj.onload = function () {
      var canvas = document.createElement("canvas");
      canvas.width = imageObj.width;
      canvas.height = imageObj.height;
      var context = canvas.getContext("2d");
      context.drawImage(imageObj, 0, 0);
      var base64 = canvas.toDataURL();
      imageSources.push({
        id: image.attrs.id,
        base64: base64,
      });
    };
  });

  // Wait for all images to load before exporting
  setTimeout(function () {
    // Export stage as JSON format
    var json = stage.toJSON();

    // Add image sources to JSON
    var jsonWithImages = JSON.parse(json);
    jsonWithImages.images = imageSources;
    jsonWithImages = JSON.stringify(jsonWithImages);

    var blob = new Blob([jsonWithImages], {
      type: "application/json",
    });
    var link = document.createElement("a");
    link.download = "stage.json";
    link.href = URL.createObjectURL(blob);
    link.click();
  }, 1000);
});
