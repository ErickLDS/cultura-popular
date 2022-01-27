<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cultura Popular Brasileira</title>
	
	{{-- Metas --}}
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{!!asset('img/logoEtec.svg')!!}">

	{{-- CSS --}}
	<link rel="stylesheet" type="text/css" href="{!!asset('css/app.css')!!}">

	{{-- Bootstrap --}}
	<link href="{!!asset('bootstrap/bootstrap.css')!!}" rel="stylesheet"  type="text/css">
	<script src="{!!asset('bootstrap/bootstrap.bundle.min.js')!!}"></script>

	{{-- Font Awesome --}}
	<script href="{!!asset('fontawesome/fontawesome.js')!!}" rel="stylesheet" type="text/css"></script>
	<link href="{!!asset('fontawesome/fontawesome.css')!!}" rel="stylesheet"  type="text/css">
	<script href="{!!asset('fontawesome/solid.js')!!}" rel="stylesheet" type="text/css"></script>
	<link href="{!!asset('fontawesome/solid.css')!!}" rel="stylesheet"  type="text/css">

	{{-- JQuery --}}
	<script src="{!!asset('jquery/jquery.slim.min.js')!!}"></script>

</head>
<body>

<div id="app">
	<div>
		<App/>
	</div>
</div>

<script type="text/javascript" src="{!!asset('js/app.js')!!}"></script>

</body>
</html>