<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="google-site-verification" content="V7ShtPVIkqDVdTEzTypxUwA6kUeSZppBczd_wGclvtA"/>
    <meta name="msvalidate.01" content="5D6AD93E360D83E0FFE44700462B2983"/>
    <meta name="yandex-verification" content="c3c9f301d1d23979"/>
    <!-- Google Crawler -->
    <title>@yield('judul')</title>
    <meta name="description" content="@yield('desc')" itemprop="description"/>
    <meta name="keywords" content="@yield('keys')" itemprop="keywords"/>
    <meta name="author" content="@yield('auth')" />
    <meta name="copyright" content="Ngodinger" itemprop="dateline"/>
    <meta name="thumbnailUrl" content="@yield('foto')" itemprop="thumbnailUrl" />
    <meta content="{{Request::url()}}" itemprop="url" />
    <meta content="@yield('judul')" itemprop="headline"/>
    <!-- Open Graph Crawler -->
    <meta property='article:author' content='https://www.facebook.com/diinggo' itemprop="author"/>
    <meta property='article:publisher' content='https://www.facebook.com/ngodingerdev' />
    <meta property="article:published_time" content="@yield('publish')" itemprop="datePublished" name="pubdate"/>
    <meta property="article:modified_time" content="@yield('update')" itemprop="dateCreated"/>
    @yield('tag')
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary"/><meta name="twitter:site" content="@NgodingerDev"/><meta name="twitter:creator" content="@diinggo_"/>
    <meta name="twitter:title" content="@yield('judul')"/>
    <meta name="twitter:description" content="@yield('desc')"/>
    <meta name="twitter:image" content="@yield('foto')"/>
    <meta name="twitter:image:src" content="@yield('foto')"/>
    <!-- Facebook Crawler -->
    <meta property="og:type" content="article" /><meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:title" content="@yield('judul')" />
    <meta property="og:image" content="@yield('foto')" />
    <meta property="og:description" content="@yield('desc')" />
    <meta property="og:updated_time" content="@yield('update')">
    <meta property="og:site_name" content="Ngodinger" />
    <meta property="fb:app_id" content="731681943648284"/>
    <meta property="fb:admins" content="100002302542104" />
    <!-- Internal Crawler -->
    <link rel="canonical" href="{{ Request::url() }}"/>
    <meta name="language" content="Indonesia"/>
    <meta name="revisit-after" content="1"/>
    <meta name="webcrawlers" content="all"/>
    <meta name="rating" content="general"/>
    <meta name="spiders" content="all"/>
    <meta name="yandex" content="all"/>
    <meta name="robots" content="all"/>
    <!-- Link Css -->
    <link rel="shortcut icon" type="icon" href="{{ url('favicon.png') }}"/>
    <link rel="icon" type="icon" href="{{ url('favicon.png') }}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/main.css')}}"/>
    <!-- Google Analistic -->
    <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-84130118-1', 'auto');
        ga('send', 'pageview');</script>
    <!-- End Google Analistic -->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KKLFGT');</script>
    <!-- End Google Tag Manager -->
    <script src="https://apis.google.com/js/platform.js"></script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
        if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
        fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <!-- Link -->
    @yield('style')
</head>
<body>
    @include('layouts.menu')
    @yield('konten')
    @yield('kaki')
    @include('layouts.foot')
    <!-- Java Script For Faster Load Site -->
    <script src="{{ url('assets/js/jquery-2.2.3.min.js') }}"></script>
  	<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
  	<script src="{{ url('assets/js/main.js') }}"></script>
  	<script src="{{ url('assets/js/style.js') }}"></script>
    <script type="text/javascript">
    var disqus_config = function () {
        this.page.url = "{{Request::url()}}";
        this.page.identifier = '@yield('kode')';
        this.page.title = '@yield('judul')';
    };
    (function() { var d = document, s = d.createElement('script');
        s.src = '//ngodinger.disqus.com/embed.js'; s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s); })();
    </script>
    @yield('pop')
    @yield('script')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</body>
</html>