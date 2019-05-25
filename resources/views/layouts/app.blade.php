<html>
    <head>
        <title>URL Shortener - @yield('title')</title>
        @section('head')
        <!-- Font Awesome for Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- JQuery Library -->
        <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
        </script>
        <style>
            /* Fixed sidenav, full height */
            .sidenav {
                height: 100%;
                width: 200px;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                padding-top: 20px;
            }
            /* sidenav links */
            .sidenav a {
                padding: 6px 8px 6px 16px;
                text-decoration: none;
                color: #818181;
                display: block;
                border: none;
                background: none;
                width:100%;
                text-align: left;
                cursor: pointer;
                outline: none;
            }

            /* On mouse-over */
            .sidenav a:hover {
                color: #f1f1f1;
            }
            /* Main content */
            .main {
                margin-left: 200px; /* Same as the width of the sidenav */
                padding: 0px 10px;
            }
        </style>
        @show
    </head>
    <body>
        @section('sidebar')
            <div class="sidenav">
                <a href="/">Home</a>
            </div>
        @show

        <div class="main">
            @yield('content')
        </div>
    </body>
</html>