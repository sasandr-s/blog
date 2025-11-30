@props(['comments'])

@foreach ($comments as $comment)
    <div class="comment mb-4 p-4 bg-white rounded border">
        <div class="flex justify-between">
            <strong>{{ $comment->user->name }}</strong>
            <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
        </div>

        <p class="my-2">{{ $comment->content }}</p>

        @auth
        <button onclick="toggleReplyForm({{ $comment->id }})" class="text-blue-500 text-sm">
            Ответить
        </button>

        <div id="reply-form-{{ $comment->id }}" class="hidden mt-3">
            <form action="/blogs/{{ $comment->creator_id }}/comments" method="POST">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                <textarea name="content" rows="2" class="w-full border p-2 rounded" required></textarea>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-2">Ответить</button>
            </form>
        </div>
        @endauth
    </div>

    {{-- Рекурсивно выводим ответы --}}
    @if($comment->replies->count())
        <div class="ml-8 border-l pl-4">
            <x-comments :comments="$comment->replies" />
        </div>
    @endif

@endforeach
