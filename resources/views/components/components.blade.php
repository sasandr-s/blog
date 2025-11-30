@foreach($comments as $comment)
    <div class="comment ml-4 border-l-2 pl-4 my-4">
        <div class="flex justify-between">
            <strong>{{ $comment->user->name }}</strong>
            <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
        </div>
        <p>{{ $comment->content }}</p>
        
        {{-- Вложенные комментарии --}}
        @if($comment->replies->count())
            <x-comments :comments="$comment->replies" />
        @endif
        
        {{-- Кнопка для ответа --}}
        <button class="text-blue-500 text-sm mt-2" onclick="toggleReplyForm({{ $comment->id }})">
            Ответить
        </button>

        {{-- Форма ответа (по умолчанию скрыта) --}}
        <div id="reply-form-{{ $comment->id }}" class="hidden mt-2">
            <form action="/blogs/{{ $comment->creator_id }}/comments" method="POST">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                <textarea name="content" rows="2" class="w-full border p-2 rounded" placeholder="Написать ответ..." required></textarea>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-2">Ответить</button>
            </form>
        </div>
    </div>
@endforeach

<script>
function toggleReplyForm(commentId) {
    var form = document.getElementById('reply-form-' + commentId);
    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
}
</script>
