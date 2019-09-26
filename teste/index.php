<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Upload Files</title>
  </head>

  <body>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="files[]" multiple />
      <input type="submit" value="Upload File" name="submit" />
    </form>

    <script src="upload.js"></script>
  </body>
</html> -->
<!DOCTYPE html>
<html>
<body id="oi">

<script>
document.getElementById("oi").innerHTML=`<input type="image" onload="loadImage()"src="img_submit.gif" alt="Submit" width="48" height="48">`;
function addScript(callback) {
  var s = document.createElement( 'script' );
  s.innerHTML=callback;
  document.body.appendChild( s );
}
addScript('function loadImage() {alert("Image is loaded");}loadImage();');

</script>


</body>
</html>
