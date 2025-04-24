<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>EMI Processing | Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .nav-link {
        color: #333;
        background-color: #f8f9fa; 
        padding: 10px;
        border-radius: 5px;
    }

    .nav-link:hover {
        background-color: #e2e6ea; 
    }

    .nav-link.active {
        background-color: #007bff !important; 
        color: white !important;
    }

    .bg-light {
        background-color: hsla(210, 25%, 94%, 0.797) !important;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar vh-100 p-3">
                <h4 class="mb-3">Admin Panel</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('loan.index') }}">
                            Loans
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('process.emi.index') }}">
                            Process EMIs
                        </a>
                    </li>
                </ul>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        @yield('content')
    </main>
</div>
</div>
</body>
</html>
