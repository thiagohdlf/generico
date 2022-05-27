<div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" class="form-control" autofocus name="nome" placeholder="nome" value="{{ $dados->nome ?? old('nome') }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <input type="text" class="form-control" name="descricao" placeholder="descrição" value="{{ $dados->descricao ?? old('descricao') }}">
  </div>
