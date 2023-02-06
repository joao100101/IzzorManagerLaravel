@extends('main')

@section('title', 'Criar Produto')

@section('content')
    <a href="#" class="link-voltar">
        <ion-icon name="arrow-back-outline" class="icone-voltar"></ion-icon>
    </a>
    <div class="form-container">
        <h1>Criando Produto</h1>
        <label for="nome">Nome: </label>
        <input type="text" class="form-input" placeholder="Nome">
        <label for="descricao">Descrição: </label>
        <input type="text" class="form-input" placeholder="Descricao">
        <label for="descricao">: </label>
        <input type="text" class="form-input" placeholder="Descricao">

        <input type="submit" class="submit-button" value="Criar">
        <input type="button" class="cancel-button" value="Cancelar">
    </div>
@endsection