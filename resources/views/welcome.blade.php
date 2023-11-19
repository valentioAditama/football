@extends('layouts.app')

@section('content')
  @include('components.loading')
  @include('components.navbar.navbar')
  @include('components.sidebar.sidebar')
  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      @include('components.carousel')
      <div class="relative overflow-x-auto mt-7">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Club
              </th>
              <th scope="col" class="px-6 py-3">
                Ma
              </th>
              <th scope="col" class="px-6 py-3">
                Me
              </th>
              <th scope="col" class="px-6 py-3">
                S
              </th>
              <th scope="col" class="px-6 py-3">
                K
              </th>
              <th scope="col" class="px-6 py-3">
                GM
              </th>
              <th scope="col" class="px-6 py-3">
                GK
              </th>
              <th scope="col" class="px-6 py-3">
                Point
              </th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $datas)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $datas->name }}
                </th>
                <td class="px-6 py-4">
                  Silver
                </td>
                <td class="px-6 py-4">
                  Laptop
                </td>
                <td class="px-6 py-4">
                  $2999
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection
