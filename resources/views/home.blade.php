@extends('layouts.app')

@section('content')
    <div class="float-left col-md-4">
        <form>
            <div class="form-group">
                <label for="rangeProd">Range production</label>
                <select id="rangeProd" name="rangeProd" class="form-control">
                    <option></option>
                    @foreach($rangeProd as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="spec">Specialization</label>
                <select id="spec" name="spec" class="form-control">
                    <option></option>
                    @foreach($spec as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Object types</label>
                <select id="type" name="type" class="form-control">
                    <option></option>
                    @foreach($types as $item)
                        <option value="{{ $item->id }}">{{ $item->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button id="find" type="button" name="find" class="btn btn-primary">Find</button>
            </div>
        </form>
    </div>
    <div id="map"></div>
@endsection
