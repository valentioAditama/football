@extends('layouts.app')

@section('content')
  @include('components.loading')
  @include('components.navbar.navbar')
  @include('components.sidebar.sidebar')

  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      <div class="relative overflow-x-auto">
        <button data-modal-target="add" data-modal-toggle="add"
                class="mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
          Add Data
        </button>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              Club 1
            </th>
            <th scope="col" class="px-6 py-3">
              Club 2
            </th>
            <th scope="col" class="px-6 py-3">
              Score 1
            </th>
            <th scope="col" class="px-6 py-3">
              Score 2
            </th>
          </tr>
          </thead>
          <tbody>
          @foreach($data as $datas)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $datas->club_1 }}
              </th>
              <td class="px-6 py-4">
                {{ $datas->club_2 }}
              </td>
              <td class="px-6 py-4">
                {{ $datas->score_1 }}
              </td>
              <td class="px-6 py-4">
                {{ $datas->score_2 }}
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>

  @include('modal.score.add')
  @include('modal.score.edit')
  @include('modal.score.delete')
  @include('components.notification')
@endsection
