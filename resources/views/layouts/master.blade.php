<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
	@yield('title')  | Magic and Illusions of George Diamond
</title>
{{-- fonts: Passion One, Patua One, Barlow Semi Condensed, Boogaloo, Dancing Script --}}
<link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed|Boogaloo|Dancing+Script|Passion+One|Patua+One|Righteous|Roboto|Satisfy|Varela+Round" rel="stylesheet">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="/css/app.css">

</head>

<body>

	@include('partials.navbar')

	@yield('topScripts')

	@yield('content')

	@yield('scrollTop')

	@include('partials.footer')

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/main.js"></script>
@yield('customScripts')

</body>
</html>