<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="common-container">
        @include('layouts.commonmodal')
        @include('layouts.modal')
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
            @foreach($data->items() as $items)
                @if($items->status === 'wait')
                    <tr element-id="{{$items->id}}" class="open-modal">
                        <td class="table-secondary">{{$items->name}}</td>
                        <td class="table-secondary">{{$items->description}}</td>
                        <td class="table-secondary">{{$items->date_create}}</td>
                        <td class="table-secondary">{{$items->date_finish}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <div class="container-pagination">
            {{$data->links()}}
        </div>
    </div>
</x-app-layout>

