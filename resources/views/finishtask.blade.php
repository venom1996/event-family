<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="common-container">
        @include('layouts.commonmodal')
        <div class="title">Завершенные</div>
        <table class="table">
            <thead>
            <tr class="bg-primary">
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата завершения</th>
                <th scope="col">Кто брал в работу</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $items)
                    <tr element-id="{{$items->id}}" class="open-modal">
                        <td class="table-success">{{$items->name}}</td>
                        <td class="table-success">{{$items->description}}</td>
                        <td class="table-success">{{$items->date_create}}</td>
                        <td class="table-success">{{$items->date_finish}}</td>
                        <td class="table-success">{{$items->userName}}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        <div class="container-pagination">
            {{$data->links()}}
        </div>
    </div>
</x-app-layout>

