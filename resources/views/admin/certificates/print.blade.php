<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        .line {
           
            width: 100%;
            height: 5px;
            color: #000;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <table style="margin: auto">
            <tbody border="1">
                <tr>
                    <td>
                        <img src="{{ asset('/storage/assets/blogo.png') }}" height="160" alt="" srcset="" style="margin-right: 100px">
                    </td>
                    <td style="text-align: center">
                        <h6 >Province of Pangasinan</h6>
                        <h6 >Municipality of Urdaneta City</h6>
                        <h6 >Barangay Nancayasan</h6>
                    </td>
                    <td>
                        <img src="{{ asset('/storage/assets/blogo.png') }}" height="160" alt="" srcset=""
                            style="margin-left: 100px">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="line" style="width: 100%;height:5px;"></div>
        <br>
        <h5 style="text-align: center">OFFICE OF THE BARANGAY CAPTAIN</h5>
        <h5 style="text-align: center">CERTIFICATE OF INDIGENCY</h5>

    </div>
</body>

</html>
