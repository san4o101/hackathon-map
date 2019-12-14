@extends('layouts.users')

@section('content')
    <div class="float-left col-md-4">
        <form id="filterForm">
            @include('partials.filtration')
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

    <!-- Success Modal -->
    <div class="modal fade" id="centerModal" tabindex="-1" role="dialog" aria-labelledby="centerModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    Успішно додано!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div id="map"></div>

    <!-- Create Modal -->
    <div class="modal fade" id="modalWindow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Створення</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modalForm">
                        @method('POST')
                        <input id="latHiddenModal" name="latHiddenModal" type="hidden">
                        <input id="lngHiddenModal" name="lngHiddenModal" type="hidden">
                        <div class="form-group">
                            <label for="nameModal">Назва об'єкту</label>
                            <textarea class="form-control" type="text" name="nameModal" id="nameModal"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="supplierModal">Постачальник продукції</label>
                            <textarea class="form-control" type="text" name="supplierModal" id="supplierModal"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="streetModal">Вулиця</label>
                            <input class="form-control" type="text" name="streetModal" id="streetModal">
                        </div>
                        <div class="form-group">
                            <label for="houseNumberModal">Номер будинку</label>
                            <input class="form-control" type="text" name="houseNumberModal" id="houseNumberModal">
                        </div>
                        @include('partials.filtration')
                        <div class="form-group border p-1">
                            <label>Графік роботи</label>
                            <br>
                            <label for="mondayModal">Понеділок</label>
                            <input class="form-control" type="text" name="mondayModal" id="mondayModal" placeholder="00:00-00:00">
                            <label for="tuesdayModal">Вівторок</label>
                            <input class="form-control" type="text" name="tuesdayModal" id="tuesdayModal" placeholder="00:00-00:00">
                            <label for="wednesdayModal">Середа</label>
                            <input class="form-control" type="text" name="wednesdayModal" id="wednesdayModal" placeholder="00:00-00:00">
                            <label for="thursdayModal">Четвер</label>
                            <input class="form-control" type="text" name="thursdayModal" id="thursdayModal" placeholder="00:00-00:00">
                            <label for="fridayModal">П'ятниця</label>
                            <input class="form-control" type="text" name="fridayModal" id="fridayModal" placeholder="00:00-00:00">
                            <label for="saturdayModal">Субота</label>
                            <input class="form-control" type="text" name="saturdayModal" id="saturdayModal" placeholder="00:00-00:00">
                            <label for="sundayModal">Неділя</label>
                            <input class="form-control" type="text" name="sundayModal" id="sundayModal" placeholder="00:00-00:00">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                    <button type="button" class="btn btn-success" id="saveModal">Зберегти</button>
                </div>
            </div>
        </div>
    </div>
@endsection
