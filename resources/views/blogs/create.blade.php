<x-layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <!-- Заголовок страницы -->
        <h1 class="text-2xl font-bold mb-6">Создать новый блог</h1>

        <form action="{{ route('blogs.store') }}" method="POST">
            @csrf

            <!-- Заголовок блога -->
            <label class="block mb-2 font-semibold" for="title">Заголовок</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"
                class="w-full mb-4 p-3 border rounded-lg" required>

            <!-- Автор блога -->
            <label class="block mb-2 font-semibold" for="author">Автор</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}"
                class="w-full mb-4 p-3 border rounded-lg" required>

            <!-- Содержимое блога -->
            <label class="block mb-2 font-semibold" for="content">Содержание</label>
            <textarea id="content" name="content" rows="6" class="w-full mb-4 p-3 border rounded-lg"
                required>{{ old('content') }}</textarea>

            <!-- Выбор локации -->
            <label class="block mb-2 font-semibold" for="place_id">🌍 Выберите локацию</label>
            <select name="place_id" id="place_id" class="w-full mb-4 p-3 border rounded-lg">
                <option value="">-- Выберите место --</option>
                @foreach($places as $place)
                    <option value="{{ $place->id }}" {{ old('place_id') == $place->id ? 'selected' : '' }}>
                        {{ $place->name }} — {{ $place->location }}
                    </option>
                @endforeach
            </select>

            <!-- Ошибки валидации -->
            @if($errors->any())
                <ul class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <!-- Кнопка публикации -->
            <button type="submit" class="btn w-full text-center">Опубликовать блог</button>
        </form>
    </div>
</x-layout>
