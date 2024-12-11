@extends('layouts.status')

@section('title', 'Estado do Pedido')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-content">
                <?php if (isset($_SESSION['error'])): ?>
                <svg class="icon error-icon" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
                <h1>Oops! Something went wrong.</h1>
                <p>We're sorry, but we encountered an error while processing your request. Please try again later or contact support if the problem persists.</p>
                <?php else: ?>
                <svg class="icon success-icon" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <h1>Success!</h1>
                <p>Your action has been completed successfully. We appreciate your participation.</p>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <a href="/" class="button <?php echo isset($_SESSION['error']) ? 'error-button' : 'success-button'; ?>">Return to Home</a>
            </div>
        </div>
    </div>

@endsection

<style>
    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .success-bg {
        background: linear-gradient(to bottom, #e6f7e6, #c8e6c9);
    }

    .error-bg {
        background: linear-gradient(to bottom, #ffebee, #ffcdd2);
    }

    .container {
        padding: 1rem;
        width: 100%;
        max-width: 400px;
    }

    .card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-content {
        padding: 2rem;
        text-align: center;
    }

    .icon {
        width: 64px;
        height: 64px;
        margin-bottom: 1rem;
    }

    .success-icon {
        color: #4caf50;
    }

    .error-icon {
        color: #f44336;
    }

    h1 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #333;
    }

    p {
        color: #666;
        margin-bottom: 1rem;
    }

    .card-footer {
        padding: 1rem;
        background-color: #f5f5f5;
        text-align: center;
    }

    .button {
        display: inline-block;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .success-button {
        background-color: #4caf50;
    }

    .success-button:hover {
        background-color: #45a049;
    }

    .error-button {
        background-color: #f44336;
    }

    .error-button:hover {
        background-color: #d32f2f;
    }

    @media (max-width: 480px) {
        .container {
            padding: 0.5rem;
        }

        .card-content {
            padding: 1.5rem;
        }
    }




</style>
