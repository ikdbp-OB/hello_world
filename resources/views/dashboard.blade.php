<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <ul>
            @forelse ($products as $product)
                <li>
                    <strong>{{ $product->name }}</strong> - ${{ number_format($product->price, 2) }}
                    @if ($product->stock > 0)
                        <span style="color:green;">(Stock: {{ $product->stock }})</span>
                    @else
                        <span style="color:red;">(Agotado)</span>
                    @endif
                </li>
            @empty
                <li>No hay productos disponibles este momento.</li>
            @endforelse
        </ul>
</x-app-layout>
