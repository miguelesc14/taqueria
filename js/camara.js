// Configure a few settings and attach camera 250x187
Webcam.set({
  width: 350,
  height: 287,
  image_format: "jpeg",
  jpeg_quality: 90,
});
Webcam.attach("#my_camera");

function take_snapshot() {
  // play sound effect
  //shutter.play();
  // take snapshot and get image data
  Webcam.snap(function (data_uri) {
    // display results in page
    //document.getElementById("captured_image").src = data_uri;
    document.getElementById("results").innerHTML =
      '<img class="after_capture_frame " src="' + data_uri + '"/>';
    //$("#data[foto]").val(data_uri);
    document.getElementById("data[foto]").value = data_uri;
  });
}

function saveSnap() {
  var base64data = $("#captured_image_data").val();
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "capture_image_upload.php",
    data: { image: base64data },
    success: function (data) {
      alert(data);
    },
  });
}
