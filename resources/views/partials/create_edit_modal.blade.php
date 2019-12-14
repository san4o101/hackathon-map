<div class="modal fade" id="{{ $modal }}ModalWindow" tabindex="-1" role="dialog"
     aria-labelledby="{{ $modal }}exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modal == 'Create' ? 'Створення' : 'Редагування' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="modalForm{{ $modal }}">
                    @method('POST')
                    <div class="form-group">
                        <label for="nameModal{{ $modal }}">Назва об'єкту</label>
                        <textarea class="form-control" type="text" name="nameModal{{ $modal }}" id="nameModal{{ $modal }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="supplierModal{{ $modal }}">Постачальник продукції</label>
                        <textarea class="form-control" type="text" name="supplierModal{{ $modal }}" id="supplierModal{{ $modal }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="erdpouCodeModal{{ $modal }}">ЄДРПОУ постачальника</label>
                        <input class="form-control" type="text" name="erdpouCodeModal{{ $modal }}" id="erdpouCodeModal{{ $modal }}">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="latModal{{ $modal }}">Географічна широта</label>
                            <input class="form-control" type="text" name="latModal{{ $modal }}" id="latModal{{ $modal }}">
                        </div>
                        <div class="col-sm">
                            <label for="lngModal{{ $modal }}">Географічна довгота</label>
                            <input class="form-control" type="text" name="lngModal{{ $modal }}" id="lngModal{{ $modal }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="streetModal{{ $modal }}">Вулиця</label>
                        <input class="form-control" type="text" name="streetModal{{ $modal }}" id="streetModal{{ $modal }}">
                    </div>
                    <div class="form-group">
                        <label for="houseNumberModal{{ $modal }}">Номер будинку</label>
                        <input class="form-control" type="text" name="houseNumberModal{{ $modal }}" id="houseNumberModal{{ $modal }}">
                    </div>
                    <div class="form-group">
                        <label for="homeDescModal{{ $modal }}">Назва будівлі або її частини</label>
                        <input class="form-control" type="text" name="homeDescModal{{ $modal }}" id="homeDescModal{{ $modal }}"
                               placeholder="Кіоск, Павільон ...">
                    </div>
                    <div class="form-group">
                        <label for="retailSpaceModal{{ $modal }}">Торговельна площа</label>
                        <input class="form-control" type="text" name="retailSpaceModal{{ $modal }}" id="retailSpaceModal{{ $modal }}">
                    </div>
                    @include('partials.filtration', ['type' => 'Modal', 'modal' => $modal])
                    <div class="form-group border p-1">
                        <label>Графік роботи</label>
                        <br>
                        <label for="mondayModal{{ $modal }}">Понеділок</label>
                        <input class="form-control" type="text" name="mondayModal{{ $modal }}" id="mondayModal{{ $modal }}"
                               placeholder="00:00-00:00">
                        <label for="tuesdayModal{{ $modal }}">Вівторок</label>
                        <input class="form-control" type="text" name="tuesdayModal{{ $modal }}" id="tuesdayModal{{ $modal }}"
                               placeholder="00:00-00:00">
                        <label for="wednesdayModal{{ $modal }}">Середа</label>
                        <input class="form-control" type="text" name="wednesdayModal{{ $modal }}" id="wednesdayModal{{ $modal }}"
                               placeholder="00:00-00:00">
                        <label for="thursdayModal{{ $modal }}">Четвер</label>
                        <input class="form-control" type="text" name="thursdayModal{{ $modal }}" id="thursdayModal{{ $modal }}"
                               placeholder="00:00-00:00">
                        <label for="fridayModal{{ $modal }}">П'ятниця</label>
                        <input class="form-control" type="text" name="fridayModal{{ $modal }}" id="fridayModal{{ $modal }}"
                               placeholder="00:00-00:00">
                        <label for="saturdayModal{{ $modal }}">Субота</label>
                        <input class="form-control" type="text" name="saturdayModal{{ $modal }}" id="saturdayModal{{ $modal }}"
                               placeholder="00:00-00:00">
                        <label for="sundayModal{{ $modal }}">Неділя</label>
                        <input class="form-control" type="text" name="sundayModal{{ $modal }}" id="sundayModal{{ $modal }}"
                               placeholder="00:00-00:00">
                    </div>
                    <div class="form-group">
                        <label for="openingDescModal{{ $modal }}">Уточнення графіку роботи</label>
                        <input class="form-control" type="text" name="openingDescModal{{ $modal }}" id="openingDescModal{{ $modal }}"
                               placeholder="Перерва на обід: 00:00-00:00" value="Перерва на обід: ">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-{{ $modal == 'Create' ? 'success' : 'primary' }}" id="{{ $modal }}SaveModal">
                    {{ $modal == 'Create' ? 'Зберегти' : 'Редагувати' }}
                </button>
            </div>
        </div>
    </div>
</div>
