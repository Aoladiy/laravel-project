@extends('layouts.admin')
@section('page-title', 'Создать новость')
@section('title', 'Создать новость')
@section('content')
    @if (session()->has('error_message'))
        @include('panels.messages.error_message', ['message' => session('error_message', [])])
    @endif
    @if (session()->has('success_message'))
        @include('panels.messages.success_message', ['message' => session('success_message', [])])
    @endif
    <form action="{{route('adminArticleCreateRequest')}}" method="post">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <div class="block">
                    <label for="field1" class="text-gray-700 font-bold">Название новости</label>
                    <input id="field1" type="text" name="title" value="{{old('title')}}"
                           class=" mt-1 block w-full rounded-md @error('title') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                    @error('title') <span class="text-xs italic text-red-600">{{$message}}</span> @enderror
                </div>
                <div class="block">
                    <label for="field1" class="text-gray-700 font-bold">Краткое описание новости</label>
                    <input id="field1" type="text" name="description" value="{{old('description')}}"
                           class=" mt-1 block w-full rounded-md @error('description') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                    @error('description') <span class="text-xs italic text-red-600">{{$message}}</span> @enderror
                </div>
                <div class="block">
                    <label for="field6" class="text-gray-700 font-bold">Детальное описание</label>
                    <textarea id="field6" name="body"
                              class="mt-1 block w-full rounded-md @error('body') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              rows="3">{{old('body')}}</textarea>
                    @error('body') <span class="text-xs italic text-red-600">{{$message}}</span> @enderror
                </div>
                <div class="block">
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="published_at"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                                       checked="">
                                <span class="ml-2">Опубликован</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="block">
                    <button
                        class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Сохранить
                    </button>
                    <button
                        class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Отменить
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
