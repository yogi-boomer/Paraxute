<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="referrer" content="origin" />
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta  name="keywords" content="Música, Escuela, Arte, Paraxute, Educación, Conocimientos musicales, Musical educativo"/>
    <meta  name="description" content="Escuela de educación musical profesional" />
    

    {{-- Plantilla obtenida de Creative Tim --}}
    {{-- Agradecimiento por la contibrucción a Creative Tim --}}
    <meta  name="twitter:card" content="product" />
    <meta  name="twitter:site" content="@creativetim" />
    <meta  name="twitter:title" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta  name="twitter:description" content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
    <meta  name="twitter:creator" content="@creativetim" />
    <meta  name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/492/original/opt_sd_laravel_thumbnail.jpg" />
    <meta  property="fb:app_id" content="655968634437471" />
    <meta  property="og:title" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta  property="og:type" content="article" />
    <meta  property="og:url" content="https://www.creative-tim.com/live/vue-argon-dashboard-laravel" />
    <meta  property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/492/original/opt_sd_laravel_thumbnail.jpg" />
    <meta  property="og:description" content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
    <meta  property="og:site_name" content="Creative Tim" />

    {{-- Fin de agradecimientos--}}
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> --}}

    <!-- Metas -->
    @if(env('PARAXUTE'))
        <script>
            (function(a,s,y,n,c,h,i,d,e){
                s.className+=' '+y;
                h.start=1*new Date;
                h.end=i=function(){
                    s.className=s.className.replace(RegExp(' ?'+y),'')
                };
                (a[n]=a[n]||[]).hide=h;
                setTimeout(function(){i();h.end=null},c);
                h.timeout=c;
            })(window,document.documentElement,'async-hide','dataLayer',4000,
            {'GTM-K9BGS8K':true});
        </script>
        <script>
            (function(i,s,o,g,r,a,m){
                i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();
                a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;
                m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-46172202-22', 'auto', {allowLinker: true});
            ga('set', 'anonymizeIp', true);
            ga('require', 'GTM-K9BGS8K');
            ga('require', 'displayfeatures');
            ga('require', 'linker');
            ga('linker:autoLink', ["2checkout.com","avangate.com"]);
            </script>
        <script>
            (function(w,d,s,l,i)
                {w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});
                var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
                j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-NKDMSK6');
        </script>
    @endif
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('../assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('../assets/img/favicon.png') }}">
    <title>
        Paraxute
    </title>
    <!-- Fonts and icons     -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') }}" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('../assets/css/nucleo-icons.css" rel="stylesheet') }}" />
    <link href="{{ asset('../assets/css/nucleo-svg.css" rel="stylesheet') }}" />
    <!-- Font Awesome Icons -->
    <script src="{{ asset('https://kit.fontawesome.com/42d5adcbca.js') }}" crossorigin="anonymous"></script>
    <link href="{{ asset('../assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('../assets/css/soft-ui-dashboard.css') }}" rel="stylesheet" />
    <!-- Alpine -->
    <script src="{{ asset('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js') }}" defer></script>
    @livewireStyles

</head>

<body class="g-sidenav-show bg-gray-100">

    {{ $slot }}

    <!--   Core JS Files   -->
    <script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
    <!-- Github buttons -->
    <script async defer src="{{ asset('https://buttons.github.io/buttons.js') }}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('../assets/js/soft-ui-dashboard.min.js?v=1.0.2') }}"></script>
    @livewireScripts
</body>

</html>
