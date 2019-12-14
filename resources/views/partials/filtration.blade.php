<div class="form-group">
    <label for="rangeProd{{ $type }}{{ $modal }}">Асортимент продукції</label>
    <select id="rangeProd{{ $type }}{{ $modal }}" name="rangeProd{{ $type }}{{ $modal }}" class="form-control">
        <option></option>
        @foreach($rangeProd as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="spec{{ $type }}{{ $modal }}">Спеціалізація</label>
    <select id="spec{{ $type }}{{ $modal }}" name="spec{{ $type }}{{ $modal }}" class="form-control">
        <option></option>
        @foreach($spec as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="type{{ $type }}{{ $modal }}">Тип об'єкту торгівлі</label>
    <select id="type{{ $type }}{{ $modal }}" name="type{{ $type }}{{ $modal }}" class="form-control">
        <option></option>
        @foreach($types as $item)
            <option value="{{ $item->id }}">{{ $item->type }}</option>
        @endforeach
    </select>
</div>
