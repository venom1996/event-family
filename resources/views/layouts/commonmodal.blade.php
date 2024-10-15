<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Детальное описание</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <input class="form-control form-control-lg" id="name-req" type="text" placeholder="Краткое название" aria-label=".form-control-lg example">
                <textarea class="form-control" id="description-req" rows="3" placeholder="Описание"></textarea>
                <input class="form-control form-control-lg" id="finish-date-req" type="text" aria-label=".form-control-lg example">
            </div>
            <div class="modal-footer">
                @if (url()->current() !== url('/finishtask'))
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="edit">Сохранить</button>
                    <button type="button" class="btn btn-primary" id="assign">Назначить себе</button>
                @endif
                @if (url()->current() == url('/dashboard'))
                    <button type="button" class="btn btn-success" id="finish">Завершить</button>
                @endif
            </div>
        </div>
    </div>
</div>
