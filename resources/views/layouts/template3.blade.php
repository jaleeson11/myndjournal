<!doctype html>
<head>
    @include('includes.head')
</head>
<body>
    <div id="app">
        @include('includes.side-bar')   
        
        @yield('content')
    </div>  
</body>
</html>