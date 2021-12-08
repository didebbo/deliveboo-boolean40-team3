<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="app">

    </div>
    <script>
        window.AppSettings = {
            csrfToken: "{{ csrf_token() }}"
        }
    </script>
    <script src="{{ asset('/js/front.js') }}"></script>
</body>

</html>
