<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <!-- Title -->
    <title>Bukti Pesan</title>
    <style>
        .head {
            margin-bottom: 10px;
            padding-bottom: 10px;
            background-color: white;
            color: black;
            padding-left: 15px;
            border-bottom: 3px solid black;
            line-height: 10px;
            position: relative;
            text-align: center;
        }

        .head h1,
        .head h2 {
            text-transform: uppercase;
        }

        .head h1 {
            font-size: 40px;
        }

        .img-fluid {
            float: left;
            right: 100px;
            position: relative;
            max-width: 30%;
            margin-right: 0px;
            margin-top: 10px;
            margin-left: 40px;
        }

        .table-custom th {
            border: 1px solid #2c2d2d !important;
            padding: 10px;
        }

        .table-custom td {
            padding: 10px;
            border: 1px solid black;
            content: attr(data-header);
        }

        .table-custom {
            border: 1px solid black;
            color: #232323;
            border-collapse: collapse;
        }

        /*.both {
          clear: both;
          text-align: center
        }
        .center{
            text-align: center;
        }*/
        .kanan {
            position: absolute;
            float: right;
            right: 0px;
            text-align: center;
            width: 100px;
        }

        .ttd {
            width: 100%;
            border: 1px solid black;
        }

        .ttdttd {
            height: 130px;
            margin-bottom: 5px;
            text-align: center;
        }

        .nama {
            border-bottom: 1px solid black;
            padding-bottom: 5px;
            text-align: center;
        }

        .isi {
            margin-top: 0px;
            width: 100%;
            border: 1px solid black;
            position: absolute;
            right: 55px;
            width: 200px;
            border: none;
        }

        .isii {
            margin-top: 30px;
            width: 100%;
            border: 10px solid black;
            position: absolute;
            left: 55px;
            width: 200px;
            border: none;
        }

        .gabung {
            position: relative;
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="head">
            <img src="{{ public_path() }}/images/logo.jpeg" class="img-fluid" alt="" width="100" height="100">
            <h2>LAPORAN TOP PELANGGAN</h2>
            <h2>MIKA TRAVEL INDONESIA</h2>
            <p>Jl. Ciledug Raya, Petukangan Utara, Jakarta Selatan 12260</p>
        </div>
        <p align="center">Periode {{ $awal }} - {{ $akhir }}</p>
        <div class="container">
            <table align="center" class="table-custom" style="width: 100%;">
                <thead>
                    <tr>
                        <th align="center">NO</th>
                        <th align="center">Email</th>
                        <th align="center" width="150">Nama</th>
                        <th align="center" width="60">Jumlah Invoice</th>
                        <th align="center" width="60">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    foreach ($laporan as $p) :
                    @endphp
                    <tr>
                        <td align="center">{{ $no }} </td>
                        <td align="center">{{ $p->email }}</td>
                        <td align="center" width="150">{{ $p->nama }} </td>
                        <td align="center" width="60">{{ $p->jml_invoice }}</td>
                        <td align="center" width="60">{{ number_format($p->total, 0, ",", ".") }}</td>
                    </tr>
                    @php
                    $no++;
                    endforeach
                    @endphp
                </tbody>
            </table>
            <div class="gabung">
                <div class="isii">
                    <div class="ttdttd">
                        <p>Manager</p>
                    </div>
                    <div class="nama">
                        <b>Sri Nuryati Maemah</b>
                    </div>
                </div>
                <div class="isi">
                    <div class="ttdttd">
                        <p>Jakarta Selatan, {{ $tgl }} </p>
                        Staf
                    </div>
                    <div class="nama">
                        <b>{{ auth()->user()->nama_staf }} </b>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>