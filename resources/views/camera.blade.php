<!DOCTYPE HTML>
<html>
<head>
    <title>Camera</title>
    <script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div style="text-align: center;">
    <video id="webCam" autoplay playsinline width="800" height="600" style="text-align: center;"></video>
    <canvas id="canvas"></canvas><br><br>
    <button onclick="takeAPicture()" class="cam-button ">Rasmga olish</button>
    <img id="capturedImage" style="display:none;"/>
</div>
<form action="{{route('Camera.store')}}" enctype="multipart/form-data">
    @csrf
    <input type="file" id="base64Image" name="image" required>
    <button type="submit" class="btn">Rasmni yuklash</button>
</form>

<script>
    const webCamElement = document.getElementById("webCam");
    const canvasElement = document.getElementById("canvas");
    const webcam = new Webcam(webCamElement, "user", canvasElement);
    webcam.start();

    function takeAPicture() {
        let picture = webcam.snap();
        const capturedImage = document.getElementById("capturedImage");
        capturedImage.src = picture;
        capturedImage.style.display = "block";
    }
    function view(form) {
        console.log("view");
        var ajax = new XMLHttpRequest();

        ajax.open("GET", form.getAttribute("action"), true);

        var formData = new FormData(form);
        ajax.send(formData);
        return false;
    }
</script>
</body>
</html>
