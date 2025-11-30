@props(['status'])

@if ($status)
    <!-- Сообщение об успешном действии -->
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
        {{ $status }}
    </div>
@endif