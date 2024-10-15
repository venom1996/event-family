<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="client-container">
        {{--    <button type="button" class="btn btn-primary">Создать</button>--}}
        @include('layouts.commonmodal')
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
                    <td class="table-warning">{{$currentItem['name']}}</td>
                    <td class="table-warning">{{$currentItem['description']}}</td>
                    <td class="table-warning">{{$currentItem['date_finish']}}</td>
                    <td class="table-warning">{{$currentItem['userName']}}</td>
                </tr>
            @endforeach

{{--            @foreach($currentTable as $currentItem)--}}
{{--                @if($currentItem->status === 'finish')--}}
{{--                    <tr element-id="{{$currentItem['id']}}" class="open-modal">--}}
{{--                        <td class="table-success">{{$currentItem['name']}}</td>--}}
{{--                        <td class="table-success">{{$currentItem['description']}}</td>--}}
{{--                        <td class="table-success">{{$currentItem['date_finish']}}</td>--}}
{{--                        <td class="table-success">{{$currentItem['userName']}}</td>--}}
{{--                    </tr>--}}
{{--                @elseif($currentItem->status === 'wait')--}}
{{--                    <tr element-id="{{$currentItem['id']}}" class="open-modal">--}}
{{--                        <td class="table-table-warning">{{$currentItem['name']}}</td>--}}
{{--                        <td class="table-table-warning">{{$currentItem['description']}}</td>--}}
{{--                        <td class="table-table-warning">{{$currentItem['date_finish']}}</td>--}}
{{--                        <td class="table-table-warning">{{$currentItem['userName']}}</td>--}}
{{--                    </tr>--}}
{{--                @endif--}}
{{--            @endforeach--}}
            </tbody>
        </table>
        <div class="container-pagination">
            {{$currentTable->links()}}
        </div>


    </div>


</x-app-layout>
