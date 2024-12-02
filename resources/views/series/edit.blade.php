<x-layout title="Editar Série {{$serie->nome}}">
    <form action="{{ route('series.update', $serie->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Define que o formulário será enviado como uma atualização -->
        
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" 
                   @isset($nome) value="{{ $nome }}" @endisset>
        </div>
        
        <button type="submit">Salvar Alterações</button>
    </form>
</x-layout>
