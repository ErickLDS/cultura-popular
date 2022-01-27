<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Gerenciador</title>
	
	{{-- Metas --}}
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{!!asset('img/logoEtec.svg')!!}">

	{{-- CSS --}}
	<link rel="stylesheet" type="text/css" href="{!!asset('css/admin-app.css')!!}">

	{{-- Bootstrap --}}
	<link href="{!!asset('bootstrap/bootstrap.css')!!}" rel="stylesheet"  type="text/css">
	<script src="{!!asset('bootstrap/bootstrap.bundle.min.js')!!}"></script>

	{{-- JQuery --}}
	<script src="{!!asset('jquery/jquery.slim.min.js')!!}"></script>

</head>
<body>

<div id="app">
	<main>
		<App>@csrf</App>
	</main>
</div>

<script type="text/javascript" src="{!!asset('js/admin-app.js')!!}"></script>

</body>
</html>