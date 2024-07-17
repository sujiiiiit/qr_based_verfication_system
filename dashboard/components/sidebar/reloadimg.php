<?php

require_once "../../../database/conn.php";


// Get the email from the cookie
$email = $_COOKIE['email'];


// Select all sheet names uploaded by the logged-in user
$sql = "SELECT id,user_id,name,size,location FROM img_file WHERE user_id = (SELECT id FROM users WHERE email = '$email')";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo " <ul class='imgul'>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo " <img id='" . $row["id"] . "' src='components/" . $row["location"] . "'></img>";
    }
    echo "</ul>";
} else {
    echo "<span style='color:#fff'>No image uploaded by the logged-in user.</span>";
}

// Close database connection
$conn->close();

?>

<script>
    $(document).ready(function () {
  console.log($(".imgul img").length);
  $(".imgul img").click(function () {
    var listItemID = $(this).attr("id");
    $.ajax({
      url: "components/imgpath/getpath.php",
      type: "POST",
      data: {
        id: listItemID,
      },
      success: function (imgpath) {
        function addimg(img) {
          // create an image object
          var imageObj = new Image();

          // set the source of the image
          imageObj.src = img;

          // wait for the image to load
          imageObj.onload = function () {
            var image = new Konva.Image({
              x: stage.width() / 2, // center the image horizontally
              y: stage.height() / 2, // center the image vertically
              image: imageObj,
              draggable: true,
              scaleX: (stage.width()*0.2) / imageObj.width, // set the initial width to 60% of canvas width
              scaleY: (stage.width()*0.2) / imageObj.width, // set the initial height to 60% of canvas height
              listening: true, // set to true to make the image selectable
            });
            // add the image to the layer
            layer.add(image);
            // select the image

            // redraw the layer
            layer.draw();
            // load the image
            // imageObj.load();
            tr.moveToTop();
            selectionRectangle.moveToTop(); // move selection rectangle to top
            selectionRectangle.select(image);
          };
        }
        addimg(imgpath);
      },
      error: function (xhr, status, error) {
        // Handle error response here
      },
    });
  });
});

</script>
