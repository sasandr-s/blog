


<nav x-data="{ open: false }" class="bg-blue-700 text-white border-b border-blue-800">
    <!-- Основное меню навигации -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Логотип -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('blogs.home') }}" class="text-2xl font-bold text-white">
                        Блог
                    </a>
                </div>

                <!-- Ссылки навигации -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('blogs.home') }}" class="inline-flex items-center px-1 pt-1 text-white hover:text-gray-200 {{ request()->routeIs('blogs.home') ? 'border-b-2 border-white' : '' }}">
                        {{ __('Главная') }}
                    </a>

                </div>
            </div>

            <!-- Выпадающее меню профиля -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-blue-600 text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Профиль') }}
                        </x-dropdown-link>

                        <!-- Аутентификация -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Выйти') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="text-sm text-white hover:text-gray-200">{{ __('Вход') }}</a>
                    <a href="{{ route('register') }}" class="text-sm bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition">{{ __('Регистрация') }}</a>
                </div>
                @endauth
            </div>

            <!-- Кнопка гамбургера для мобильных -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-200 hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Адаптивное меню навигации -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-blue-600">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('blogs.home') }}" class="block pl-3 pr-4 py-2 text-white hover:bg-blue-500 {{ request()->routeIs('blogs.home') ? 'border-l-4 border-white' : '' }}">
                {{ __('Главная') }}
            </a>
        </div>

        <!-- Адаптивные настройки профиля -->
        <div class="pt-4 pb-1 border-t border-blue-500">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-blue-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 text-white hover:bg-blue-500">
                    {{ __('Профиль') }}
                </a>

                <!-- Аутентификация -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" class="block pl-3 pr-4 py-2 text-white hover:bg-blue-500"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Выйти') }}
                    </a>
                </form>
            </div>
            @else
                <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 text-white hover:bg-blue-500">
                    {{ __('Логин') }}
                </a>
                <a href="{{ route('register') }}" class="block mx-3 my-2 px-4 py-2 bg-blue-700 text-white text-center rounded-lg hover:bg-blue-800">
                    {{ __('Регистрация') }}
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>