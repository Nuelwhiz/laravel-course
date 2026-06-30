@if (session('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" 
        class="bg-green-500 text-white p-4 rounded-lg mb-6 text-center 
    fixed top-0 px-48 py-3 left-1/2 transform -translate-x-1/2">
        <p>{{ session('message') }}</p>
    </div>
@endif