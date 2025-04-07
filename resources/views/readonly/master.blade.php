<!--En el pdf donde tengo que copiar la pagina igual no aparece resultados...-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Olimpiadas Informáticas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{asset('/readonly/assets/css/main.css')}}" />
	</head>
	<body class="is-preload">
		<!-- Header -->
        @include('readonly.partials.header')
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
                @include('readonly.partials.main')
				<!-- Footer -->
                @include('readonly.partials.footer')
			</div>
		<!-- Scripts -->
			<script src="{{asset('/readonly/assets/js/jquery.min.js')}}"></script>
			<script src="{{asset('/readonly/assets/js/jquery.scrollex.min.js')}}"></script>
			<script src="{{asset('/readonly/assets/js/jquery.scrolly.min.js')}}"></script>
			<script src="{{asset('/readonly/assets/js/browser.min.js')}}"></script>
			<script src="{{asset('/readonly/assets/js/breakpoints.min.js')}}"></script>
			<script src="{{asset('/readonly/assets/js/util.js')}}"></script>
			<script src="{{asset('/readonly/assets/js/main.js')}}"></script>
	</body>
</html>