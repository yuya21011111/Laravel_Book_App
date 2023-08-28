<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- こころ明朝 -->
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">

</head>

<body class="antialiased bg-gray-150">
    <nav class="bg-gray-800">
        <div class="max-w-10xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-shrink-0 items-center">
                    <div class="w-16">
                        <x-application-logo class="block h-9 w-auto fill-current  dark:text-gray-200" />
                    </div>
                </div>
                
                <div class="flex justify-end z-10">
                    <button class="flex border border-blue bg-green-400 p-3 rounded text-blue shadow-inner"
                        dropdown="true" data-target="dropdown-menu">
                        メニュー
                    </button>
                    @if (Route::has('login'))
                    <div id="dropdown-menu"
                        class="invisible absolute w-48 pin-t pin-l mt-16 bg-white shadow rounded border overflow-hidden">
                        @auth
                        <button type="button" onclick="location.href='{{ route('book') }}'"
                            class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-green-400 hover:bg-grey whitespace-no-wrap">
                            ブックアプリ
                        </button>
                        @else
                        <button type="button" onclick="location.href='{{ route('login') }}'"
                            class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-green-400 hover:bg-grey whitespace-no-wrap">
                            ログイン
                        </button>
                        @if (Route::has('register'))
                        <button type="button" onclick="location.href='{{ route('register') }}'"
                            class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-green-400 hover:bg-grey whitespace-no-wrap">
                            新規登録
                        </button>
                         <!-- ゲストログイン機能 -->
                         <form action="{{ route('guestLogin') }}" methods="post">
                          @csrf
                          <button
                              class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-green-400 hover:bg-grey whitespace-no-wrap">ゲストでログイン
                          </button>
                      </form>
                        @endif
                </div>
            </div>
        </div>
        
      </div>
      @endif
      @endauth
    </nav>
    <div class="over-image">
        <img src="{{ asset('images/book.jpg') }}" />
        <p class="text-5xl text-lime-400">読んだ本を管理へ〜</p>
    </div>

    <div class="bg-orange-100">
        <div
            class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">ブックアプリとは</h2>
                <p class="mt-4 text-gray-500">読んだ本を記録したり、これから読みたいと思った本を登録できるアプリです。</p>

                <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">

                </dl>
            </div>
            <div class="sample columns-2 md:columns-2 lg:columns-2">
                <img class="mb-4 w-128" src="{{ asset('images/sample1.png') }}">
                <img class="mb-4 w-128" src="{{ asset('images/sample2.png') }}">
            </div>
        </div>
    </div>
    <footer class="text-gray-600 bg-gray-300 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <p class="text-sm text-gray-700 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">© 2023 ブックアプリ</font>
                </font>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-100">
                    <a href="https://github.com/yuya21011111"><img src="{{ asset('images/GitHub.ico') }}"
                            class="w-5 h-5"></a>
                </a>
                <a class="ml-3 text-gray-100">
                    X
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                        </rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
            </span>
        </div>
    </footer>
    
    <!-- ドロップダウンメニュー表示 -->
    <script>
        const $dropdowns = Array.prototype.slice.call(document.querySelectorAll('[dropdown="true"]'), 0)
        if ($dropdowns.length > 0) {
            $dropdowns.forEach($el => {
                $el.addEventListener("click", event => {
                    document.getElementById($el.dataset.target).classList.toggle("invisible")
                })
            })
        }
    </script>
</body>

</html>
