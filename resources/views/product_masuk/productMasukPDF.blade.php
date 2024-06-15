<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>


</head>

<style>
    #table-data {
        border-collapse: collapse;
        padding: 3px;
    }

    #table-data td, #table-data th {
        border: 1px solid black;
    }
</style>

<body>
<div class="invoice-box">


    <table border="0" id="table-data" width="100%">
        <tr>
            <td width="70px"><b>Invoice</b></td>
            <td width="">: {{ $product_masuk->id }}</td>
            <td width="30px"><b>Created</b></td>
            <td>: {{ $product_masuk->tanggal }}</td>
        </tr>

        <tr>
            <td><b>Contact</b></td>
            <td>: {{ $product_masuk->supplier->telepon }}</td>
            <td><b>Address</b></td>
            <td>: {{ $product_masuk->supplier->alamat }}</td>
        </tr>

        <tr>
            <td><b>Supplier</b></td>
            <td>: {{ $product_masuk->supplier->nama }}</td>
            <td><b>Email</b></td>
            <td>: {{ $product_masuk->supplier->email }}</td>
        </tr>

        <tr>
            <td><b>Product</b></td>
            <td >: {{ $product_masuk->product->nama }}</td>
            <td><b>Quantity</b></td>
            <td >: {{ $product_masuk->qty }}</td>
        </tr>

    </table>

    {{--<hr  size="2px" color="black" align="left" width="45%">--}}


    <table border="0" width="80%">
        <tr align="right">
            <td>Best Regard</td>
        </tr>
    </table>

</div>
    <table border="0" width="80%">
        <tr align="right">
            <td>Simco Group</td>
        </tr>
    </table>
</div>
