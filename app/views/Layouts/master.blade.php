<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
</head>
<body>

{{ link_to_route('NewCategory', 'Add New Category') }} &nbsp; || &nbsp; {{ link_to_route('NewProduct', 'Add New Product') }} <br>

		@yield('content')

</body>
</html>