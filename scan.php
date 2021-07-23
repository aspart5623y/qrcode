<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h3>This is a Qr Code scanner system</h3>

    <center>
        <video width="400" height="400" id="preview"></video> 
    </center>
    


    <script src="./jQuery/jquery-3.5.1.min.js"></script>
    <script src="./instascan.min.js"></script>
    <script>
        const args = { video: document.getElementById('preview') };

        window.URL.createObjectURL = (stream) => {
            args.video.srcObject = stream;
            return stream;
        }; 

        const scanner = new Instascan.Scanner(args);
        

        Instascan.Camera.getCameras().then(function (cameras){
            if(cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.log('No camera found!!');
            }
        }).catch(function(e){
            console.log(e);
        });

        scanner.addListener('scan', function(content) {
            // $('#modal').on('show.bs.modal', function(){
            //     $('#text').text(content);
            // });
            // $('#modal').modal('show');
            alert(content);
        });

    </script>
</body>
</html>