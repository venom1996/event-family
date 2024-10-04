<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Создать дело
</button>

<!-- Модальное окно -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <input class="form-control form-control-lg" id="name" type="text" placeholder="Краткое название" aria-label=".form-control-lg example">
{{--                <input class="form-control form-control-lg" id="description" type="text" placeholder="Описание" aria-label=".form-control-lg example">--}}
                <textarea class="form-control" id="description" rows="10" placeholder="Описание"></textarea>
                <label for="inputDate">Введите дату:</label>
                <input class="form-control form-control-lg" id="date-appointment" type="date" placeholder="Дата назначения" aria-label=".form-control-lg example">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="save">Добавить</button>
            </div>
        </div>
    </div>
</div>

