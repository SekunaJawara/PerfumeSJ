<x-layout>
    <div class="bg-gradient-to-b from-gray-50 to-white min-h-screen py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">

                <!-- Header -->
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">Finalizar Compra</h1>
                    <p class="text-gray-600">Completa tu pedido de forma segura</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- Left Column - Payment Form -->
                    <div class="lg:col-span-2">
                        <form method="POST" action="{{ route('stripe.payment') }}" id="stripe-form"
                            class="bg-white rounded-2xl shadow-lg p-8">
                            @csrf
                            <!-- Progress Steps -->
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center font-semibold">
                                        1
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-900">Información</span>
                                </div>
                                <div class="flex-1 h-1 bg-gray-200 mx-4"></div>
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center font-semibold">
                                        2
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-500">Confirmación</span>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="mb-8">
                                <h2 class="text-xl font-bold text-gray-900 mb-4">Información de Contacto</h2>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                        <input type="email" placeholder="tu@email.com"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Address -->
                            <div class="mb-8">
                                <h2 class="text-xl font-bold text-gray-900 mb-4">Dirección de Envío</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                                        <input type="text" placeholder="Juan"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Apellidos</label>
                                        <input type="text" placeholder="García"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
                                        <input type="text" placeholder="Calle Principal 123"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Ciudad</label>
                                        <input type="text" placeholder="Madrid"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Código
                                            Postal</label>
                                        <input type="text" placeholder="28001"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="mb-8">
                                <h2 class="text-xl font-bold text-gray-900 mb-4">Método de Pago</h2>
                                <div class="border border-gray-300 rounded-lg p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="text-sm font-medium text-gray-700">Pago seguro con Stripe</span>
                                        <div class="flex gap-2">
                                            <img src="https://img.icons8.com/color/48/visa.png" alt="Visa" class="h-8">
                                            <img src="https://img.icons8.com/color/48/mastercard.png" alt="Mastercard"
                                                class="h-8">
                                            <img src="https://img.icons8.com/color/48/amex.png" alt="Amex" class="h-8">
                                        </div>
                                    </div>

                                    <!-- Stripe Card Element Placeholder -->
                                    <div id="card-element" class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                                        <!-- Stripe.js injects the Card Element here -->
                                        <p class="text-sm text-gray-500 text-center">El formulario de tarjeta de Stripe
                                            aparecerá aquí</p>
                                    </div>

                                    <div id="card-errors" class="text-red-600 text-sm mt-2"></div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="button" onclick="createToken()"
                                class="w-full bg-indigo-600 text-white py-4 rounded-lg font-semibold text-lg hover:bg-indigo-700 transition-colors duration-300 flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                Pagar Ahora
                            </button>
                            <input type="hidden" name="price" value="{{ $total }}">
                            <input type="hidden" name="stripeToken" id="stripe-token">

                            <!-- Security Badge -->
                            <div class="mt-6 flex items-center justify-center gap-2 text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                </svg>
                                Pago 100% seguro y encriptado
                            </div>
                        </form>
                    </div>

                    <!-- Right Column - Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-lg p-8 sticky top-24">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Resumen del Pedido</h2>

                            <!-- Artículos seleccionados -->
                            <div class="space-y-4 mb-6">
                                @foreach($cartItems as $item)
                                <div class="flex gap-4">
                                    <img src="{{ $item->perfume->logo ? (str_starts_with($item->perfume->logo, 'http') ? $item->perfume->logo : (str_starts_with($item->perfume->logo, 'images/') ? asset($item->perfume->logo) : Storage::url($item->perfume->logo))) : asset('images/heroimg.png') }}"
                                        alt="{{ $item->perfume->name }}"
                                        class="w-20 h-20 object-cover rounded-lg">
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-900 text-sm">{{ $item->perfume->Name }}</h3>
                                        <p class="text-sm font-semibold text-gray-900 mt-1">{{ number_format($item->perfume->price, 2) }}€</p>
                                    </div>
                                    <span class="text-sm text-gray-600">x{{ $item->quantity }}</span>
                                </div>
                                @endforeach
                            </div>

                            <div class="border-t border-gray-200 pt-4 space-y-3">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-semibold text-gray-900">{{ number_format($total, 2) }}€</span>
                                </div>
                                <div class="border-t border-gray-200 pt-3 flex justify-between">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <span class="text-lg font-bold text-indigo-600">{{ number_format($total, 2) }}€</span>
                                </div>
                            </div>

                            <!-- Promo Code -->
                            <div class="mt-6">
                                <div class="flex gap-2">
                                    <input type="text" placeholder="Código promocional"
                                        class="flex-1 px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <button
                                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                                        Aplicar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Stripe.js Script (Add this before closing body tag) -->
    <script src="https://js.stripe.com/clover/stripe.js"></script>
    <script type="text/javascript">
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');


        function createToken() {
            stripe.createToken(cardElement).then(function (result) {
                console.log(result);
                if (result.token) {
                    document.getElementById('stripe-token').value = result.token.id;
                    document.getElementById('stripe-form').submit();

                }
            });
        }
    </script>
    <script>
        // Initialize Stripe (Replace with your publishable key)
        // const stripe = Stripe('your_publishable_key_here');
        // const elements = stripe.elements();
        // const cardElement = elements.create('card');
        // cardElement.mount('#card-element');

        console.log('Stripe payment form ready');
    </script>
</x-layout>