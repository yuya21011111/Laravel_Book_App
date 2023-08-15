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
                      <div class="flex justify-end pl-4 mt-4  w-full mx-auto">
                        <form id="delete_{{$book->id}}" method="post" action="{{ route('book.destroy' ,['book' => $book->id]) }}">
                          @csrf
                          @method('delete')
                        <td class="md:px-4 py-3 flex justify-end ">
                          <a href="#" data-id="{{$book->id}}" onclick="deletePost(this)" class=" text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-700 rounded">削除</a>
                        </td>
                        </form>
                      </div>
                        <div class="mt-6 border-t border-gray-100">
                          <dl class="divide-y divide-gray-100">
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">本タイトル</dt>
                              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $book->name }}</dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">ステータス</dt>
                              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $book->status }}</dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">著者名</dt>
                              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $book->author }}</dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">出版社</dt>
                              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $book->publication }}</dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">登録日</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ Carbon\Carbon::parse($book->read_at)->format('Y年n月j日') }}</dd>
                              </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">メモ</dt>
                              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $book->note }}</dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm font-medium leading-6 text-gray-900">画像</dt>
                               <!-- 画像表示 -->
                               <x-image-thumbnail :filename="$book->filename" type="image" />
                            </div>
                          </dl>
                        </div>
                      </div>
                      <div class="flex justify-end pl-4 mt-4  w-full mx-auto">
                        <button type="button"  onclick="location.href='{{ route('book')}}'"  class=" mr-2 bg-gray-500 hover:bg-gray-700 text-white rounded px-4 py-2">戻る</button>
                        <button type="button"  onclick="location.href='{{ route('book.edit',$book->id)}}'"  class=" mr-2 bg-blue-500 hover:bg-blue-700 text-white rounded px-4 py-2">編集</button>
                     </div>
                </div>
            </div>

        </div>
    </div>
    <!-- 削除確認 -->
    <script>
      function deletePost(e) {
        'use stricr';
        if(confirm('本当に削除してもいいですか？（2度と復元はできません）')){
          document.getElementById('delete_' + e.dataset.id).submit();
        }
      }
    </script>
</x-app-layout>
