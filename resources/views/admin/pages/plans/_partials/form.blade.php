@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="price">Preço:</label>
    <input type="text" name="price" id="price" class="form-control" value="{{ $plan->price ?? old('price') }}" >
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" name="description" id="description" class="form-control" value="{{ $plan->description ?? old('description') }}" >
</div>