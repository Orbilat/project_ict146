<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barcode</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <style>
        .row{
            margin:0px;
        }
        h2{
            margin-top:60px;
        }
    </style>
</head>
<body>
    <div class="row">
        @foreach($produits as $p)
        <div class="col-md-4">
            <div>{!! DNS1D::getBarcodeHTML ($p->id, 'C128A') !!}</div>
            <h2>{{ $p->risNumber}}</h2>
        </div>
        @endforeach
    </div>
    <button onclick="myFunction()">Print this page</button>
</body>
<script>
function myFunction() {
  window.print();
}
</script>
</html>