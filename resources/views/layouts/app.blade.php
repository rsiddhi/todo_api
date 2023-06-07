<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-with, initial-scale=1.0">
    <title>My Laravel App</title>
</head>
<body>
    <div>
        <ul>
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault();this.closest('form').submit()">Logout</a>
                </form>
            </li>
        </ul>
    </div>

    @yield('content')

</body>
</html>