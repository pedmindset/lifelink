<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
       const ADMIN_ROUTE = "admin";
       const ADMIN_APP_ROUTE = "admin/app";
       const ADMIN_API_ROUTE = "admin/api";
    </script>
</head>
<body>
   <div id="dApp">
   </div>
   <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>