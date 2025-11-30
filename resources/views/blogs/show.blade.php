<x-layout>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <!-- Заголовок блога -->
        <h1 class="text-3xl font-bold mb-4">{{ $creator->title }}</h1>
        <p class="text-gray-600 mb-4">Автор: <strong>{{ $creator->author }}</strong></p>

        <!-- Контент блога -->
        <div class="mb-6">
            {{ $creator->content }}
        </div>

        <!-- Информация о месте -->
        @if($creator->place)
            <div class="bg-blue-600 text-white p-6 rounded-2xl shadow-md mb-6">
                <h3 class="text-xl font-bold mb-2">📍 Информация о месте</h3>
                <p><strong>Название:</strong> {{ $creator->place->name }}</p>
                <p><strong>Расположение:</strong> {{ $creator->place->location }}</p>
                <p><strong>Описание:</strong> {{ $creator->place->description }}</p>
            </div>
        @endif

        <!-- Кнопка удаления (только для авторизованных) -->
        @auth
            <form action="{{ route('blogs.destroy', $creator->id) }}" method="POST"
                onsubmit="return confirm('Вы уверены, что хотите удалить блог?');" class="inline-block mb-4">
                @csrf
                @method('DELETE')
                <button class="btn bg-red-700 hover:bg-red-800">Удалить блог</button>
            </form>
        @endauth

        <!-- Кнопка возврата к списку блогов -->
        <a href="{{ route('blogs.home') }}" class="btn">⬅ Назад к блогам</a>
        
        <!-- Раздел комментариев -->
        <div class="mt-8 border-t pt-6">
            <h2 class="text-2xl font-bold mb-4">Комментарии</h2>
            
            <!-- Отображение комментариев -->
            @if($creator->comments()->whereNull('parent_id')->count() > 0)
                <div class="space-y-4 mb-6">
                    <x-comments 
                        :comments="$creator->comments()->whereNull('parent_id')->get()" 
                        :creatorId="$creator->id" 
                    />
                </div>
            @else
                <p class="text-gray-500 mb-6">Комментариев пока нет. Будьте первым, кто оставит комментарий!</p>
            @endif
            
            <!-- Форма добавления комментария -->
            @auth
                <form action="{{ route('comments.store', ['creator' => $creator->id]) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Добавить комментарий</label>
                        <textarea name="content" id="content" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Отправить комментарий</button>
                </form>
            @else
                <div class="bg-gray-50 p-4 rounded-lg text-center">
                    <p>Пожалуйста, <a href="{{ route('login') }}" class="text-blue-600 hover:underline">войдите в аккаунт</a>, чтобы оставить комментарий.</p>
                </div>
            @endauth
        </div>
    </div>

    <script>
        // Функция для отображения формы ответа на комментарий
        function toggleReplyForm(commentId) {
            const replyForm = document.getElementById(`reply-form-${commentId}`);
            if (replyForm) {
                replyForm.classList.toggle('hidden');
                
                // Автофокус на текстовое поле при открытии формы
                if (!replyForm.classList.contains('hidden')) {
                    const textarea = replyForm.querySelector('textarea');
                    if (textarea) {
                        textarea.focus();
                    }
                }
            }
        }
        
        // Закрытие всех форм ответов при клике вне формы
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.reply-form') && !event.target.matches('[onclick*="toggleReplyForm"]')) {
                document.querySelectorAll('.reply-form').forEach(form => {
                    form.classList.add('hidden');
                });
            }
        });
    </script>
</x-layout>
