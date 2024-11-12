@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Medicamentos</h1>
    <div class="search-container">
        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input type="text" class="search-input" placeholder="Buscar medicamento...">
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Referência</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Indústria</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento->referencia }}</td>
                    <td>{{ $medicamento->nome }}</td>
                    <td>{{ $medicamento->quantidade }}</td>
                    <td>{{ $medicamento->industria }}</td>
                    <td>{{ $medicamento->created_at->toFormattedDateString() }}</td>
                    <td>{{ $medicamento->updated_at->toFormattedDateString() }}</td>
                    <td>
                        <button class="btn btn-outline btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <span class="sr-only">Edit</span>
                        </button>
                        <form action="{{ route('medicamentos.destroy', $medicamento->referencia) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" style="display:inline;">
                            {{csrf_field()}}
                            @method('DELETE')
                            <button type="submit" class="btn btn-destructive btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                <span class="sr-only">Delete</span>
                            </button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #ffffff;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 24px;
    }

    .search-container {
        position: relative;
        max-width: 300px;
        margin-bottom: 16px;
    }

    .search-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 16px;
        height: 16px;
        color: #6b7280;
    }

    .search-input {
        width: 100%;
        padding: 8px 8px 8px 32px;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 14px;
    }

    .table-container {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: #6b7280;
        border-radius: 10%;
        border-left: 1px solid #e5e7eb;
        border-right: 1px solid #e5e7eb;
        border-top: 1px solid #e5e7eb;

    }

    th,
    td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;



    }


    th {
        background-color: #ffffff;
        font-weight: 600;
        color: #374151;
        padding: 15px;
        border-bottom: 1px solid #e5e7eb;
    }
    tr:hover {
        background-color: #f2f2f2;
    }


    th:first-child {
        border-top-left-radius: 8px;
    }
    th:last-child {
        border-top-right-radius: 8px;
    }


    td {
        padding: 18px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }



    .actions {
        text-align: right;
    }

    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-outline {
        background-color: transparent;
        border: 1px solid #d1d5db;
    }

    .btn-destructive {
        background-color: #ef4444;
        color: white;
    }

    .btn-icon {
        padding: 5px;
    }

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }

    @media (max-width: 640px) {
        .container {
            padding: 16px;
        }

        th,
        td {
            padding: 8px;
        }
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
