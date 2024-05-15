@extends('site.layouts.basico')

@section('titulo', 'Página de Fornecedores')

@section('conteudo')
    @include('site.layouts._partials.menu')
    <h1>Fornecedores</h1>
@endsection


    <br>

    {{-- @dd($fornecedores) --}}
    {{--  
    @if (count($fornecedores) > 0 && count($fornecedores) < 10) 
        <h3>Há alguns fornecedores cadastrados</h3>
    @elseif (count($fornecedores) > 10)
        <h3>Há muitos fornecedores cadastrados</h3>
    @else
        <h3>Não há fornecedores cadastrados</h3>
    @endif --}}

    @isset($fornecedores)
        @foreach($fornecedores as $indice => $fornecedor)
            Interação: {{ $loop->iteration }}
            <br/>
            @if($loop->first)
                <h1> Primeiro Fornecedor da Lista </h1>
            @endif
            Fornecedor: {{ $fornecedor['nome '] }}
            <br/>
            Status: {{ $fornecedor['status'] ?? 'Sem Status definido!' }}
            <hr><br/>
        @endforeach
    @endisset
    
</body>
</html>





