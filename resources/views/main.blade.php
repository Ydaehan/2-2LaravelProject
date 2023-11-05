<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  @vite('resources/css/font.css')
  
</head>
<body class="min-h-screen">
  <x-header />
  <x-dynamic-component :component="$componentName" :user_id="$user_id ?? null" :nickname="$nickname ?? null" :posts="$posts ?? null" />  
  @if(session('success'))
    <script>
      alert("{{ session('success') }}");
    </script>
  @endif
  @if(session('error'))
    <script>
      alert("{{ session('error') }}");
    </script>
  @endif
</body>
</html>

