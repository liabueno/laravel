<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <ul>
        <li>
            <a href="{{ route('site.principal') }}">Principal</a>
        </li>
        <li>
            <a href="{{ route('site.sobrenos') }}">Sobre Nós</a>
        </li>
        <li>
            <a href="{{ route('site.contato') }}">Contato</a>
        </li>
        <li>
            <a href="{{ route('site.login') }}">Login</a>
        </li>
        <li>
            <a href="{{ route('app.fornecedores') }}">Fornecedores</a>
        </li>
        <li>
            <a href="{{ route('app.clientes') }}">Clientes</a>
        </li>
        <li>
            <a href=" {{ route('app.produtos') }}">Produtos</a>
        </li>
    </ul>

    <h1>Fornecedores</h1>

    <br>

    <!-- @dd($fornecedores) -->
    
    @if (count($fornecedores) > 0 && count($fornecedores) < 10) 
        <h3>Há alguns fornecedores cadastrados</h3>
    @elseif (count($fornecedores) > 10)
        <h3>Há muitos fornecedores cadastrados</h3>
    @else
        <h3>Não há fornecedores cadastrados</h3>
    @endif
    
</body>
</html>





