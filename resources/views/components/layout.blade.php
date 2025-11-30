<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Сообщение об успехе -->
    @if(session('success'))
        <div id="flash-message"
            class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg shadow-md text-center transition-opacity duration-1000">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const el = document.getElementById('flash-message');
                if (el) {
                    el.classList.add('opacity-0'); // плавное исчезновение
                    setTimeout(() => el.remove(), 1000); // удаление через 1с
                }
            }, 3000); // показывать 3 секунды
        </script>
    @endif

    <!-- Шапка сайта -->
    <header class="bg-blue-700 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Левый блок: название сайта -->
            <h2 class="text-2xl font-bold">Блог</h2>

            <!-- Навигация справа -->
            <nav class="flex items-center space-x-6">
                <a href="{{ route('blogs.home') }}" class="hover:text-gray-200">Главная</a>

                @auth
                    <a href="{{ route('blogs.create') }}" class="hover:text-gray-200">Создать блог</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-gray-200">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="hover:text-gray-200">Регистрация</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Основной контент -->
    <main class="flex-grow container mx-auto p-6">
        {{ $slot }}
    </main>

    <!-- Подвал -->
    <footer class="bg-blue-800 text-white text-center p-4 mt-10">
        &copy; <span id="year"></span> Блог
    </footer>

    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>
</body>

</html>
