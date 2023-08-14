<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Book_Create
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- toasterメッセージ -->  
        <x-toastr status="session('status')" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                        <button type="button"  onclick="location.href='{{ route('book.create') }}'"  class="flex ml-auto  text-white bg-yellow-400 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-700 rounded">新規作成</button>
                    </div>
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">名前</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ステータス</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">著者</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">出版社</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">読破日</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メモ</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細表示</th>
                                  <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ $book->id }}</td>
                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ $book->name }}</td>
                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ $book->status }}</td>
                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3 text-lg text-gray-900">{{ $book->author }}</td>
                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ $book->publication }}</td>
                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ Carbon\Carbon::parse($book->read_at)->format('Y年n月j日') }}</td>
                                    <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ Str::limit($book->note,20,$end='...') }}</td>
                                    <td class="border-t-2 border-b-2 border-gray-200">
                                        <button type="button" onclick="location.href='{{ route('book.show',$book->id) }}'" class="flex ml-auto   text-white bg-indigo-500 border-0 py-1 px-3 focus:outline-none hover:bg-indigo-600 rounded">詳細</button>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            {{ $books->links() }}
                          </div>
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
