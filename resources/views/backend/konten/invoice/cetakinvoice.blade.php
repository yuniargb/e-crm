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
        font-size: 10px;
        vertical-align: top;
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
        font-size: 10px;
        height: 90px;
        min-height: 90px;
        max-height: 90px;
        border-bottom: 1px solid black;
        vertical-align: top;
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

    .namapelanggan {
        border: 1px solid #000;
        padding: 10px;
    }

    .namapelanggan table td {
        vertical-align: top;
    }

    .peserta thead {
        border-bottom: 1px solid black;
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
            <div class="namapelanggan">
                <table width="520">
                    <tr>
                        <td rowspan="3">Customer</td>
                        <td rowspan="3" width="150">: {{ $invoice->pelanggan['nama_pelanggan'] }}</td>
                        <td>Invoice No</td>
                        <td>: {{ $invoice->id }}</td>
                    </tr>
                    <tr>
                        <td>Invoice Date</td>
                        <td>: {{ date('d-M-Y', strtotime($invoice->tgl_inv))}}</td>
                    </tr>
                    <tr>
                        <td>Due Date</td>
                        <td>: {{ date('d-M-Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <table width="545" class="peserta">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>DOCUMENT NO.</th>
                    <th>PAX'S NAME</th>
                    <th>DESCRIPTIONS</th>
                    <th>AMOUNT(IDR)</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                $total = 0;
                @endphp
                @foreach ($peserta as $p)
                @php
                if ($p->diskon != null) {
                $hasil = ($p->harga * $p->diskon) / 100;
                $harga = $p->harga - $hasil;
                $paket = "/" . $p->diskon . "%";
                } else {
                $harga = $p->harga;
                $paket = "";
                }
                $total += $harga;
                @endphp
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $p->no_dukumen }}</td>
                    <td>{{ $p->nama_peserta }}</td>
                    <td>{{ $p->id }}/{{ date('d-M-Y', strtotime($p->tgl_berangkat)) }}{{ $paket }}</td>
                    <td>{{ number_format($harga,0,",",".") }}</td>
                </tr>
                @php
                $no++;
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th align="center" colspan="4">TOTAL</th>
                    <th>{{ number_format($total,0,",",".") }}</th>
                </tr>
            </tfoot>
        </table>
        <table width="545" class="table-custom">
            <tbody>
                <tr>
                    <td width="300">
                        Note
                        <ul>
                            <li>Payment in Rupiah is based on the currency exchange rate, valid on the day payment</li>
                            <li>Payment by cheque should be made payable to PT.Usaha Wisata Mandiri and valid upon clearance.</li>
                            <li>Bank transfer should be addressed to PT. Usaha Wisata Mandiri account alt</li>
                        </ul>
                    </td>
                    <td align="center">
                        <div class="ttdttd">
                            Received by:
                        </div>
                    </td>
                    <td align="center">
                        <div class="ttdttd">
                            Issued<br>PT.Usaha Wisata Mandiri
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>