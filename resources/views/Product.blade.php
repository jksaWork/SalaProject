<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>id</th>
                <th>sala id</th>
                <th>name</th>
                <th>price</th>
                <th>sala price </th>
                <th>const price </th>
                <th>image</th>
                <th>quantity</th>
                <th>sku</th>
                <th>type</th>
                <th>stauts</th>
                <th>short code</th>
                <th>alibale</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($Products as $Product )
            <tr>
                <td>{{$Product->id}}</td>
                <td>{{$Product->product_id}}</td>
                <td>{{$Product->name}}</td>
                <td>{{$Product->price}}</td>
                <td> {{$Product->sale_price}} </td>
                <td> {{$Product->const_price}} </td>
                <td> <img src="{{$Product->image}}" widtd="100px" height="100px" alt=""></td>
                <td>{{$Product->quantity}}</td>
                <td>{{$Product->sku}}</td>
                <td>{{$Product->type}}</td>
                <td>{{$Product->status}}</td>
                <td>{{$Product->short_link_code}}</td>
                <td>{{$Product->is_available}}</td>
            </tr>
            @empty
            <tr>
                <td> jksa altifani</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>id</th>
                <th>sala id</th>
                <th>name</th>
                <th>price</th>
                <th>sala price </th>
                <th>const price </th>
                <th>image</th>
                <th>quantity</th>
                <th>sku</th>
                <th>type</th>
                <th>stauts</th>
                <th>short code</th>
                <th>alibale</th>
            </tr>
        </tfoot>
    </table>
    <div>
        {{ $Products->links() }}
    </div>
</body>

</html>
