<!DOCTYPE html>
<html>
    <head>
        <title>CRUD Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>@yield('title')</h2>
                </div>
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
