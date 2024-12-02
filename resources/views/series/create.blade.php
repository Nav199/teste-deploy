<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="POST"  :nome="old('nome')" update="false">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" @isset($nome) value="{{ $nome }}" @endisset>
        </div>
        <button type="submit">Adicionar</button>
    </form>
</x-layout>
