@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6">
    <!-- Заголовок страницы -->
    <h1 class="text-4xl font-bold text-blue-700 mb-6">О Блоге</h1>
    
    <!-- Миссия и история -->
    <div class="bg-white rounded-lg shadow-md p-8 mb-8">
        <h2 class="text-2xl font-semibold text-blue-600 mb-4">Наша миссия</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Наша миссия - предоставить платформу для авторов, чтобы они могли делиться своими историями, идеями и опытом с миром. Мы стремимся создать сообщество, где каждый может найти вдохновение, учиться и расти вместе с другими.
        </p>
        
        <h2 class="text-2xl font-semibold text-blue-600 mb-4">Наша история</h2>
        <p class="text-gray-700 leading-relaxed">
          Блог был основан в 2024 году группой энтузиастов, которые верят в силу слова и общения. С тех пор мы выросли в динамичное сообщество авторов и читателей, объединенных общей страстью к письму и обмену знаниями.
        </p>
    </div>
    
    <!-- Призыв к участию в сообществе -->
    <div class="bg-blue-50 rounded-lg p-8 border border-blue-100">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">Присоединяйтесь к нашему сообществу</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            Мы приветствуем всех, кто разделяет наше видение и хочет стать частью растущего сообщества. Независимо от того, опытный ли вы автор или только начинаете, у нас есть место для вас.
        </p>
        <a href="{{ route('register') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Зарегистрироваться</a>
    </div>
</div>
@endsection
