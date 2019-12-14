@extends('layouts.app')

@section('content')
    <div class="float-left col-md-4">
        <form id="filterForm">
            @include('partials.filtration', ['type' => '', 'modal' => ''])
            <div class="form-group">
                <label for="street">Вулиця</label>
                <input id="street" name="street" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="supplier">Постачальник продукції</label>
                <input id="supplier" name="supplier" type="text" class="form-control">
            </div>
            <div class="form-group">
                <button id="find" type="button" name="find" class="btn btn-primary">Пошук</button>
                <button id="clear" type="button" name="clear" class="btn btn-secondary">Очистити</button>
            </div>
        </form>
    </div>

    <!-- Create\Delete Modal -->
    <div class="modal fade" id="centerModal" tabindex="-1" role="dialog" aria-labelledby="centerModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="bodyText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div id="map"></div>

    <!-- Create Modal -->
    @include('partials.create_edit_modal', ['modal' => 'Create'])

    <!-- Edit Modal -->
    @include('partials.create_edit_modal', ['modal' => 'Edit'])
@endsection
