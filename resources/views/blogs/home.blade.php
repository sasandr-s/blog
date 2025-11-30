<x-layout>
    <div class="home-container">
        <!-- Заголовок страницы -->
        <h1 class="text-3xl font-bold text-center mb-6">
            {{ isset($query) ? 'Результаты поиска по "' . $query . '"' : 'Последние блоги' }}
        </h1>
        
        <!-- Форма поиска -->
        <div class="mb-6 max-w-md mx-auto">
            <form action="{{ route('blogs.search') }}" method="GET" class="flex">
                <input type="text" name="query" placeholder="Поиск блогов..." class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ isset($query) ? $query : '' }}">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Поиск</button>
            </form>
        </div>

        <!-- Список блогов -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($creators as $creator)
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300">
                    <h2 class="text-xl font-bold text-blue-700 mb-2">{{ $creator->title }}</h2>
                    <p class="text-gray-600 mb-2">Автор: <strong>{{ $creator->author }}</strong></p>
                    <p class="text-gray-700 mb-4">{{ Str::limit($creator->content, 120, '...') }}</p>
                    <p class="text-sm text-gray-500 mb-4">
                        Локация: {{ $creator->place ? $creator->place->name : 'Неизвестно' }}
                    </p>
                    <a href="{{ route('blogs.show', $creator->id) }}" class="btn">Подробнее</a>
                </div>
            @endforeach
        </div>

        <!-- Пагинация -->
        <div class="mt-6 text-center">
            {{ $creators->links('pagination::tailwind') }}
        </div>

        <!-- Кнопка создания нового блога для авторизованных -->
        @auth
            <div class="mt-8 text-center">
                <a href="{{ route('blogs.create') }}" class="btn px-6 py-3 text-lg">+ Создать новый блог</a>
            </div>
        @endauth
    </div>
</x-layout>
