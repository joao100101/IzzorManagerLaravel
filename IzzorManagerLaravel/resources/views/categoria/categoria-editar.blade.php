@extends('layouts.main')

@section('title', 'Editar Categoria')

@section('content')
    <a href="#" class="link-voltar">
        <ion-icon name="arrow-back-outline" class="icone-voltar"></ion-icon>
    </a>
    <div class="form-container">
        <h1>Atualizando Categoria</h1>
        <label for="nome">Nome: </label>
        <input type="text" class="form-input" placeholder="Nome">
        <label for="descricao">Descrição: </label>
        <input type="text" class="form-input" placeholder="Descricao">

        <input type="submit" class="submit-button" value="Atualizar">
        <input type="button" class="cancel-button" value="Cancelar">
    </div>
@endsection