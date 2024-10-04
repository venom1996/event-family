<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="client-container">
        {{--    <button type="button" class="btn btn-primary">Создать</button>--}}
        @include('layouts.modal')

        <div id="carouselExampleControls" data-interval="false" class="carousel slide" id="carusel">
            <div class="carousel-controls">
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="carousel-inner" data-interval="false">
                <div class="carousel-item active">
                    <div class="title">Обязанности в работе</div>

                    <table class="table">
                        <thead>
                        <tr class="bg-primary">
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Дата завершения</th>
                            <th scope="col">Кто взял в работу</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($currentTable as $currentItem)
                            <tr element-id="{{$currentItem['id']}}" class="open-modal">
                                <td class="table-success">{{$currentItem['name']}}</td>
                                <td class="table-success">{{$currentItem['description']}}</td>
                                <td class="table-success">{{$currentItem['date_finish']}}</td>
                                <td class="table-success">{{$currentItem['userName']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="carousel-item">
                    <div class="title">Общие задачи</div>
                    <table class="table">
                        <thead>

                        <tr class="bg-primary">
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col">Дата завершения</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $items)
                            @if($items['status'] === 'wait')
                                <tr element-id="{{$items['id']}}" class="open-modal">
                                    <td class="table-secondary">{{$items['name']}}</td>
                                    <td class="table-secondary">{{$items['description']}}</td>
                                    <td class="table-secondary">{{$items['date_create']}}</td>
                                    <td class="table-secondary">{{$items['date_finish']}}</td>
                                </tr>
                            @endif

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Заголовок модального окна</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control form-control-lg" id="name-req" type="text"
                               placeholder="Краткое название" aria-label=".form-control-lg example">

                        <textarea class="form-control" id="description-req" rows="3" placeholder="Описание"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="edit">Сохранить
                        </button>
                        <button type="button" class="btn btn-primary" id="assign">Назначить себе</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


</x-app-layout>
