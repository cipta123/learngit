<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Web App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Center logo */
        .logo {
            text-align: center;
            margin-top: 50px; /* Adjust as needed */
        }

        /* Center form */
        .form-container {
            text-align: center;
            margin-top: 50px; /* Adjust as needed */
        }

        /* Center table */
        .table-container {
            margin-top: 50px; /* Adjust as needed */
        }
    </style>
</head>
<body>

<!-- Logo -->
<div class="logo">
    <img src="img/logoUT.png" alt="Logo" width="150">
</div>

<!-- Form -->
<div class="container form-container">
    <form id="submit-form">
        <div class="form-group">
            <input type="text" class="form-control" id="input-text" placeholder="masukkan NIM">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<!-- Cards -->
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">OSMB Rangkasbitung</h5>
                    <p class="card-text">Total Peserta: <span id="record-count-rangkas"></span> </p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">OSMB Labuan</h5>
                    <p class="card-text">Total Peserta: <span id="record-count-labuan"></span> </p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">OSMB Kabupaten tangerang</h5>
                    <p class="card-text">Total Peserta: <span id="record-count-kab"></span> </p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">OSMB Kota Tangerang</h5>
                    <p class="card-text">Total Peserta: <span id="record-count-kotang"></span> </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Table -->
<div class="container table-container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Masa</th>
                <th>kegiatan</th>
                
            </tr>
        </thead>
        <tbody id="table-body">
            <!-- Table rows will be inserted here dynamically -->
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Your JavaScript file -->
<script src="script.js"></script>

</body>
</html>
