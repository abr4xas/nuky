@include('nuky::admin.partials.header')
<body>
    <div class="body--background"></div>
    <div class="header--background uk-box-shadow-medium"></div>
    <div class="uk-container uk-container-large">
        <div class="uk-overflow-auto">
            <nav class="uk-navbar-container uk-margin uk-navbar-transparent uk-light">
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav">
                        <li>
                            <a href="#0">Nuky</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="uk-section uk-section-small uk-light">
        <div class="uk-text-center">
            <h1 class="title">Dashboard</h1>
            <h3 class="subtitle">Welcome back, {{ Auth::user()->name }}</h3>
        </div>
    </div>

    <div class="uk-section uk-section-small" id="app">
        <div class="uk-container uk-container-large">
            <div uk-grid>
                @include('nuky::admin.partials.sidebar')
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="uk-section uk-section-xsmall">
        <div class="uk-text-center uk-text-muted">
            Designed &amp; developed by Èrik Campobadal &mdash; Copyright &copy; 2017
        </div>
    </footer>
    <script src="{{ asset('/nuky/js/theme.min.js') }}"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses', 'Profit'],
                ['2014', 1000, 400, 200],
                ['2015', 1170, 460, 250],
                ['2016', 660, 1120, 300],
                ['2017', 1030, 540, 350]
            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                },
                colors: ['#3F51B5', '#F44336', '#FFEB3B'],
            };

            var chart = new google.charts.Bar(document.getElementById('chart1'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

    </script>
</body>

</html>
