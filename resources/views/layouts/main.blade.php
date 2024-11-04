<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0; overflow-x:hidden;">


<x-header title="HELLO"/>


<main style="flex: 1;">
    @yield('content')
</main>


<x-footer/>

</body>
</html>

<style>

    ::-webkit-scrollbar {
        width: 12px;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
        border: 10px;

    }

    ::-webkit-scrollbar-thumb {
        background-color: #35A1A8;
        border-radius: 10px;
        border: 3px solid #f0f0f0;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #118891;
        cursor: pointer;
    }

</style>
