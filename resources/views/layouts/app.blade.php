

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Bus Ticket System</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/locations">Locations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/trips">Trips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/seat-allocations">Bookings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container mt-5">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

