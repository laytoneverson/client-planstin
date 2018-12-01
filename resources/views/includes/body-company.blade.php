<!DOCTYPE html>
<html lang="{{\App::getLocale()}}" class="no-js">
<head prefix="{{\App\Utils\SocialMarkup::makeRegisteredPrefixes()}}">

    @include('includes.head')

</head>
<body>

@include($includes->header ?: 'includes.header-company')

<div id="content">
    @yield('content')
</div>


<pre class="hidden session-token">
        <?php echo 'level = ' . session('user.level') . "\n"; ?>
    <?php print_r(session('token')); ?>
    <?php print_r(session('salesforce.resources')); ?>
	</pre>
</body>
</html>

