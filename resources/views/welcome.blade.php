<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">

    <!-- Шапка / Навигация -->
    <header class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6">
            <!-- Логотип -->
            <h1 class="text-2xl font-bold text-blue-600">Блог</h1>

            <!-- Навигация -->
            <nav class="flex space-x-6">
                <a href="{{ route('blogs.home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Главная</a>

                @auth
                    <a href="{{ route('blogs.create') }}" class="text-gray-700 hover:text-blue-600 font-medium">Создать
                        блог</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600 font-medium">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 font-medium">Регистрация</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Главный раздел (Hero) -->
    <section class="min-h-screen flex items-center justify-center px-6 pt-20">
        <div class="grid md:grid-cols-2 gap-8 items-center max-w-6xl mx-auto">

            <!-- Левая часть -->
            <div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                    Добро пожаловать в <span class="text-blue-600">Блог ✨</span>
                </h2>
                <p class="mt-4 text-gray-600 text-lg">
                    Читайте как гость или зарегистрируйтесь.
                </p>

                <!-- Кнопки -->
                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('blogs.home') }}"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                        Войти как гость
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-pink-500 text-white rounded-lg shadow hover:bg-pink-600 transition">
                        Регистрация и публикация
                    </a>
                </div>
            </div>

            <!-- Правая часть (Изображение) -->
            <div class="hidden md:block">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f" alt="Иллюстрация блоггинга"
                    class="w-full rounded-lg shadow-lg">
            </div>

        </div>
    </section>

</body>

</html>
