<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <x-index :links="[]" :data="$data->toArray()" :route_create="'create'" :route_update="'update'" :route_delete="'delete'"></x-index>
    {!! $data->links('pagination::bootstrap-4') !!}
</body>

</html>
