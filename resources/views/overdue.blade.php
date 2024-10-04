<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="container-overdue">
        <table class="table">
            <thead>

            <tr class="bg-primary">
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Дата завершения</th>
                <th scope="col">Кто просрочил</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $currentItem)
                <tr element-id="{{$currentItem['id']}}" class="open-modal">
                    <td class="table-danger">{{$currentItem['name']}}</td>
                    <td class="table-danger">{{$currentItem['description']}}</td>
                    <td class="table-danger">{{$currentItem['date_finish']}}</td>
                    <td class="table-danger">{{$currentItem['userName']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</x-app-layout>
