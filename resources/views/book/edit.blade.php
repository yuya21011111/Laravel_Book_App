<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            本詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="px-4 sm:px-0">
                          <h3 class="text-base font-semibold leading-7 text-gray-900">本の詳細</h3>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                          <form method="post" action="{{ route('book.update', ['book' => $book->id]) }}">
                            @csrf
                          <dl class="divide-y divide-gray-100">
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">本タイトル</dt>
                              <input type="text" name="name" class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0" value="{{ $book->name }}" />
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">ステータス</dt>
                              <div class="relative flex justify-around">
                                <div><input type="radio" name="status" value="1" class="mr-2"
                                    @if ($book->status == '1') { checked } @endif />読書中
                                </div>
                                <div><input type="radio" name="status" value="2" class="mr-2"
                                    @if ($book->status == '2') { checked } @endif />未読
                                </div>
                                <div><input type="radio" name="status" value="3" class="mr-2"
                                   @if ($book->status == '3') { checked } @endif />読破
                                </div>
                                <div><input type="radio" name="status" value="4" class="mr-2"
                                   @if ($book->status == '4') { checked } @endif />今後読みたい
                                </div>
                            </div>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">著者名</dt>
                              <input type="text" name="author" class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0" value="{{ $book->author }}"/>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">出版社</dt>
                              <input type="text" name="publication" class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"  value="{{ $book->publication }}"/>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">読破日</dt>
                                <input type="date" name="read_at" class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0" value="{{ $book->read_at }}"/>
                              </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">メモ</dt>
                              <textarea type="text" name="note" class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $book->note }}</textarea>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">画像</dt>
                              <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                  <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                    <div class="flex w-0 flex-1 items-center">
                                      <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                      </svg>
                                      <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">resume_back_end_developer.pdf</span>
                                        <span class="flex-shrink-0 text-gray-400">2.4mb</span>
                                      </div>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                      <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    </div>
                                  </li>
                                  <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                    <div class="flex w-0 flex-1 items-center">
                                      <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                      </svg>
                                      <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">coverletter_back_end_developer.pdf</span>
                                        <span class="flex-shrink-0 text-gray-400">4.5mb</span>
                                      </div>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                      <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    </div>
                                  </li>
                                </ul>
                              </dd>
                            </div>
                          </dl>
                        </div>
                      </div>
                      <div class="flex justify-end pl-4 mt-4  w-full mx-auto">
                        <button type="button"  onclick="location.href='{{ route('book')}}'"  class=" mr-2 bg-gray-500 hover:bg-gray-700 text-white rounded px-4 py-2">戻る</button>
                        <button type="submit"  class=" mr-2 bg-blue-500 hover:bg-blue-700 text-white rounded px-4 py-2">更新</button>
                     </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</x-app-layout>
