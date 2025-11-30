@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6">
    <!-- Заголовок страницы -->
    <h1 class="text-4xl font-bold text-blue-700 mb-6">Свяжитесь с нами</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Форма отправки сообщения -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Отправьте нам сообщение</h2>
            <p class="text-gray-700 leading-relaxed mb-6">
                Есть вопросы, предложения или хотите просто поздороваться? Нам будет приятно получить ваше сообщение! Заполните форму ниже, и мы ответим вам как можно скорее.
            </p>
            
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">Имя</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div>
                    <label for="message" class="block text-gray-700 font-medium mb-2">Сообщение</label>
                    <textarea name="message" id="message" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Отправить сообщение</button>
            </form>
        </div>
        
        <!-- Контактная информация и график работы -->
        <div>
            <div class="bg-blue-50 rounded-lg p-8 border border-blue-100 mb-8">
                <h2 class="text-2xl font-semibold text-blue-700 mb-4">Контактная информация</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <h3 class="font-medium text-gray-800">Email</h3>
                            <p class="text-gray-600">contact@macandreblogs.com</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div>
                            <h3 class="font-medium text-gray-800">Телефон</h3>
                            <p class="text-gray-600">+1 (555) 123-4567</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-semibold text-blue-600 mb-4">Часы работы</h2>
                <ul class="space-y-2 text-gray-700">
                    <li class="flex justify-between"><span>Понедельник - Пятница:</span> <span>9:00 - 17:00</span></li>
                    <li class="flex justify-between"><span>Суббота:</span> <span>10:00 - 14:00</span></li>
                    <li class="flex justify-between"><span>Воскресенье:</span> <span>Выходной</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
