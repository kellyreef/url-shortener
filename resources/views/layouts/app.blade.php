<html>
    <head>
        <title>URL Shortener - @yield('title')</title>
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
                font-size: 20px;
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
                font-size: 20px; /* Increased text to enable scrolling */
                padding: 0px 10px;
            }
        </style>
    </head>
    <body>
        @section('sidebar')
            <div class="sidenav">
                <a href="/">Home</a>
                <a href="/r/analytics">Analytics</a>
            </div>
        @show

        <div class="main">
            @yield('content')
        </div>
    </body>
</html>