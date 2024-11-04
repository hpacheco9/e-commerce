@extends('layouts.blank')

@section('title', 'login')

<style>
    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        height: 100vh;
        background-color: #ffffff;
        font-family: Arial, sans-serif;
        color: #333;
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
        max-width: 400px; /* Center and constrain width */
        margin: auto; /* Center align the form */
    }

    .right-column h2 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        color: #149FA8;
    }

    /* General styling for inputs and buttons */
    .right-column input,
    .right-column button {
        width: 100%;
        margin-bottom: 1rem;
        padding: 0.75rem;
        border: none;
        font-size: 1rem;
    }

    /* Full-width inputs with max-width */
    .full-width {
        max-width: 100%; /* Aligns with the form width */
    }

    /* Specific styling for Código Postal and Porta */
    .short-inputs {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        width: 100%;
    }

    .short {
        flex: 1;
        padding: 0.75rem;
        border-radius: 0.25rem;
        border: 1px solid #ddd;
        font-size: 1rem;
    }

    /* Button styling */
    button[type="submit"] {
        background-color: #149FA8;
        color: white;
        border: none;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%; /* Aligns with the form width */
    }

    button[type="submit"]:hover {
        background-color: #0f7d86;
    }

    /* Additional text styling */
    #no-account {
        font-size: 1rem;
        color: #808080;
        margin-top: 1rem;
        text-align: center;
    }

    #no-account a {
        color: #149FA8;
        font-weight: bold;
        text-decoration: none;
    }

    #no-account a:hover {
        text-decoration: underline;
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
                {{ csrf_field() }}
                <input type="text" placeholder="Nome" name="name" class="full-width">
                <input type="email" placeholder="Email" name="email" class="full-width">
                <input type="password" placeholder="Senha" name="password" class="full-width">
                <input type="number" pattern="\d{9}" placeholder="NIF" name="nif" class="full-width" maxlength="9">
                <input type="text" placeholder="Rua" name="rua" class="full-width">
                <div class="short-inputs">
                    <input type="text" placeholder="Código Postal" name="codigoPostal" class="short" pattern="^\s*?\d{5}(?:[-\s]\d{4})?\s*?$">
                    <input type="text" placeholder="Porta" name="porta" class="short">
                </div>
                <button type="submit">Criar</button>
            </form>


            <p id="no-account">Já tens uma conta? <a href="/login">Login</a></p>
        </div>
    </div>
@endsection
