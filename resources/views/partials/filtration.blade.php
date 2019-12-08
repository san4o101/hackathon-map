<div class="form-group">
    <label for="rangeProd">Асортимент продукції</label>
    <select id="rangeProd" name="rangeProd" class="form-control">
        <option></option>
        @foreach($rangeProd as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="spec">Спеціалізація</label>
    <select id="spec" name="spec" class="form-control">
        <option></option>
        @foreach($spec as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="type">Тип об'єкту торгівлі</label>
    <select id="type" name="type" class="form-control">
        <option></option>
        @foreach($types as $item)
            <option value="{{ $item->id }}">{{ $item->type }}</option>
        @endforeach
    </select>
</div>
