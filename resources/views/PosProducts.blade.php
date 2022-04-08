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
                <th>product code</th>
                <th>name</th>
                <th> price </th>
                <th>currency</th>
                <th>point of sale price </th>
                <th>short code</th>
                <th>avalibale</th>
                <th>merchant id </th>
                <th>merchant name </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($Products as $Product )
            <tr>
                <th>{{$Product->product_code}}</th>
                <th>{{$Product->name ->ar ." | ". $Product->name->en }}</th>
                <th>{{$Product->product_price}}</th>
                <th>{{$Product->product_currency}} </th>
                <th>{{$Product->pos_price }}</th>
                <th>{{$Product->available}}</th>
                <th>{{$Product->merchant_id}}</th>
                <th>{{$Product->merchant_name}}</th>
            </tr>
            @empty
            <tr>
                <td colspan="12">
                    jksa altigani osman
                </td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>product code</th>
                <th>name</th>
                <th> price </th>
                <th>currency</th>
                <th>point of sale price </th>
                <th>short code</th>
                <th>avalibale</th>
                <th>merchant id </th>
                <th>merchant name </th>
            </tr>
        </tfoot>
    </table>
    <div>
        {{ $Products->links() }}
    </div>
</body>

</html>
