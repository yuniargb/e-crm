<html>

<head>
    <title>Cetak PDF</title>
</head>
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
    }

    .head h3 {
        text-transform: uppercase;
    }

    .head h1 {
        font-size: 23px;
        margin-right: 35px;
    }

    .head p {
        font-size: 10px;
    }

    .img-fluid {
        float: left;
        left: 25px;
        position: absolute;
        max-width: 10%;
        margin-right: 20px;
        margin-top: 10px;
    }

    .table-custom th {
        border: 1px solid #2c2d2d !important;
        padding: 10px;
    }

    .table-custom td {
        padding: 10px;
        border: 1px solid black;
    }

    .table-custom {
        border: 1px solid black;
    }

    /*.both {
      clear: both;
      text-align: center
    }
    .center{
        text-align: center;
    }*/
    .kanan {
        float: right;
        position: absolute;
        right: 10px;
        border-left: 1px solid black;
        padding-left: 15px;
    }

    .kpd {
        margin-bottom: 15px;
    }

    .ttd {
        width: 100%;
        border: 1px solid black;
    }

    .ttdttd {
        text-align: center;
        height: 100px;
    }

    .ttdttds {
        text-align: center;
        height: 114px;
    }

    .isi {
        width: 100%;
    }

    .petugas {
        text-align: center;
        border-bottom: 2px solid black;
    }

    .table-custom {
        color: #232323;
        border-collapse: collapse;
    }

    .table-header span {
        padding-left: 15px;
    }
</style>

<body>
    <div class="body">
        <div class="head">
            <table width="520" class="table-header">
                <tr>
                    <td>
                        <h4>PT.USAHA WISATA MANDIRI</h4>
                        <p>Universitas Budi Luhur</p>
                        <p>Jl. Ciledug Raya, Petukangan Utara, Jakarta Selatan 12260</p>
                        <p>Phone : 021-58908584/86 <span> Email : mikatour@mikatourindonesia.com </span></p>
                        <p>Fax : 021-58908584</p>
                    </td>
                    <td width="260" align="right">
                        <img src="{{ public_path() }}/images/logoo.jpeg" alt="" width="85%" height="63">
                        <h1>Invoice</h1>
                    </td>
                </tr>
            </table>
        </div>

        <!-- <div class="container">
            <div class="kpd">
                <p>Kepada Yth.</p>
                <table>
                    <tr>
                        <th width="100">Nama</th>
                        <td width="350"></td>
                        <th width="100">Kode Faktur</th>
                        <td width="150"></td>
                    </tr>
                    <tr>
                        <th width="100">No Telp</th>
                        <td width="350"></td>
                        <th width="100">Kode Invoice</th>
                        <td width="150"></td>
                    </tr>
                    <tr>
                        <th width="100">Kurir</th>
                        <td width="350"></td>
                        <th width="100">Paket</th>
                        <td width="150"></td>
                    </tr>
                    <tr>
                        <th width="100">Alamat</th>
                        <td width="350"></td>
                        <th width="150">Tanggal</th>
                        <td width="100"></td>
                    </tr>
                </table>
                <p>Dengan surat ini kami mengirimkan barang-barang kepada saudara, dengan rincian sebagai berikut :</p>
            </div>
            <table align="center" class="table-custom">
                <thead>
                    <tr>
                        <th align="center">NO</th>
                        <th align="center">SKU</th>
                        <th align="center">Nama</th>
                        <th align="center">Warna</th>
                        <th align="center">Size</th>
                        <th align="center">Qty</th>
                        <th align="center">Berat</th>
                    </tr>
                </thead>
                <tbody>
                            <tr>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                            </tr>
                </tbody>
            </table>
            <div class="kpd">
                <p>Mohon diperiksa kembali keadaan barang dan diterima.</p>
            </div>
            <table align="center">
                <tr>
                    <td width="150">
                        <div class="isi" style="margin-right: 20px;">
                            <div class="ttdttds">
                                Penerima
                            </div>
                            <div class="petugas">

                            </div>
                        </div>
                    </td>
                    <td width="150">
                        <div class="isi" style="margin-left: 20px;">
                            <div class="ttdttd">
                                Karyawan
                            </div>
                            <div class="petugas">
                            </div>
                            <div class="nip">
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div> -->
    </div>
</body>

</html>