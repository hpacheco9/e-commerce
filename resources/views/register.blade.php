@extends('layouts.blank')

@section('title', 'login')

<style>
    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        height: 100vh;
        background-color: #ffffff;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    .left-column {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .left-column img {
        max-width: 70%;
    }

    .right-column {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    .right-column h2 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        color: black;
        display: flex;
        justify-content: center;
    }

    .right-column input, .right-column button {
        width: 100%;
        height: 30%;
        margin-bottom: 1rem;
        padding: 0.75rem 1rem;
        border-radius: 0.25rem;
        border: none;
        font-size: 1rem;
    }


    button[type="submit"] {
        background-color: #149FA8;
        color: white;
    }

    button[type="submit"]:hover {
        background-color: #0f7d86;
        cursor: pointer;
    }

    #no-account {
        font-size: 1rem;
        color: #808080;
    }

</style>

@section('content')

    <div class="container">

        <div class="left-column">
            <img src="/images/medivitta-high-resolution-logo.png" alt="Medivitta Logo">
        </div>
        <div class="right-column">
            <h2>Registar</h2>
            <form method="post" action="/register">
                {{csrf_field()}}
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Senha">
                <button type="submit">Entrar</button>
            </form>
            <p id="no-account">Já tens uma conta? <a href="/login">Login</a></p>
        </div>
    </div>
@endsection