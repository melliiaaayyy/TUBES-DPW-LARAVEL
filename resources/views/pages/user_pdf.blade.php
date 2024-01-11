<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>    
 
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Stocks</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($Inventory as $p)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$p->Name}}</td>
                <td>{{$p->Stocks}}</td>
                <td>{{$p->Price}}</td>
                <td>{{$p->created_at}}</td>
                <td>{{$p->updated_at}}</td>            
            </tr>
            @endforeach
        </tbody>
    </table>
 
</body>
</html>