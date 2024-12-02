<x-layout title="Séries">
    <a href="{{ route('series.create') }}">Adicionar</a> 
    @isset($mensagem_sucesso)
        <div class="alert alert-success">
            {{ $mensagem_sucesso }}
        </div>
    @endisset
    
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">
                {{ $serie->nome }} <!-- Exibindo o nome da série -->
                <span class="d-flex">
                    <button class="">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">Editar</a>

                    </button>
                </span>
                <form method="post" action="{{ route('series.destroy', $serie->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
