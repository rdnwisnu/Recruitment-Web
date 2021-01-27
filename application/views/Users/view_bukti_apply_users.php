<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Meta Link</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../assets/bootstrap/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container"> 
        <table border="1" width="100%" style="margin-top: 50px;">
        <tr>
        <td>
        <h3 class="text-center text-uppercase" style="background-color:blue; padding: 10px; margin-bottom:50px;color:white;">bukti job recruitment</h3>
        <img src="../../assets/img/download.png" class="img-thumbnail mx-auto d-block" width="150" height="auto">
        <table class="table table-bordered mt-5" border="1" style="width:70%" align="center">
            <tbody>
                <tr>
                    <th scope="row">Nama</th>
                    <td><?php echo $nama; ?></td>
                </tr>
                <tr>
                    <th scope="row">Job</th>
                    <td><?php echo $title ?></td>
                </tr>
                <tr>
                    <th scope="row">Date Apply</th>
                    <td><?php echo date("d-M-Y", strtotime($tanggal_apply)) ?></td>
                </tr>
            </tbody>
        </table>
        <h5 class="text-center" style="margin-top: 60px;">Code Recruitment :</h5>
        <h3 class="text-center font-weight-bold mt-5"><?php echo '[ '.$kode_bukti.' ]'; ?></h3>
        <footer style="background-color:blue;">
            <p style="margin-top: 10%; margin-left: 2%; margin-bottom: 0; color:white; padding:5px;">*simpan bukti ini untuk mengikuti tes</p>
        </footer>
        </td>
        </tr>
        </table>
    </div>
</body>

</html>