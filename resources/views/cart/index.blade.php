<x-layout>


  <section class="w-full bg-white py-9 px-8">
    <h1 class="font-sans text-center text-[#191919] text-[32px] font-semibold leading-[38px]">
      My Shopping Cart
    </h1>
    @if(session('error'))
      <div class="max-w-xl mx-auto mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
        <p class="font-bold">Error</p>
        <p>{{ session('error') }}</p>
      </div>
    @endif

    <form id="checkout-form" action="{{ route('stripe') }}" method="GET">
      <div class="flex items-start mt-8 gap-6">
        <div class="bg-white p-4 w-[800px] rounded-xl">
          <table class="w-full bg-white rounded-xl">
            <thead>
              <tr
                class="text-center border-b border-gray-400 w-full text-[#7f7f7f] text-sm font-medium uppercase leading-[14px] tracking-wide">
                <th class="px-2 py-2"></th>
                <th class="text-left px-2 py-2">Product</th>
                <th class="px-2 py-2">price</th>
                <th class="px-2 py-2">Quantity</th>
                <th class="px-2 py-2">Subtotal</th>
                <th class="w-7 px-2 py-2"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($cartItems as $item)
                <tr id="row-{{ $item->id }}" class="text-center">
                  <td class="px-2 py-2">
                    <input type="checkbox" name="items[]" value="{{ $item->id }}" checked
                      class="w-4 h-4 accent-indigo-600 cursor-pointer">
                  </td>
                  <td class="px-2 py-2 text-left align-top">
                    <img
                      src="{{ $item->perfume->logo ? (str_starts_with($item->perfume->logo, 'http') ? $item->perfume->logo : (str_starts_with($item->perfume->logo, 'images/') ? asset($item->perfume->logo) : Storage::url($item->perfume->logo))) : asset('images/heroimg.png') }}"
                      alt="test" class="w-[100px] mr-2 inline-block h-[100px]" /><span>{{ $item->perfume->Name }}</span>
                  </td>
                  <td class="px-2 py-2">{{ $item->perfume->price }}</td>
                  <td class="p-2 mt-9 bg-white rounded-[170px] border border-[#a0a0a0] justify-around items-center flex">
                    <!-- Botón restar -->
                    <svg width="14" height="15" class="cursor-pointer btn-minus" data-id="{{ $item->id }}"
                      data-url="{{ route('cart.update', $item->id) }}" viewBox="0 0 14 15" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.33398 7.5H11.6673" stroke="#666666" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    </svg>
                    <span id="qty-{{ $item->id }}"
                      class="w-10 text-center text-[#191919] text-base font-normal leading-normal">{{ $item->quantity }}</span>
                    <!-- Botón sumar -->
                    <svg class="cursor-pointer relative btn-plus" data-id="{{ $item->id }}"
                      data-url="{{ route('cart.update', $item->id) }}" width="14" height="15" viewBox="0 0 14 15"
                      fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.33398 7.49998H11.6673M7.00065 2.83331V12.1666V2.83331Z" stroke="#1A1A1A"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </td>
                  <td id="subtotal-{{ $item->id }}" class="px-2 py-2">
                    {{ number_format($item->perfume->price * $item->quantity, 2) }}€
                  </td>
                  <td class="px-2 py-2">
                    <svg width="24" class="cursor-pointer btn-delete" data-id="{{ $item->id }}"
                      data-url="{{ route('cart.destroy', $item->id) }}" height="25" viewBox="0 0 24 25" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M12 23.5C18.0748 23.5 23 18.5748 23 12.5C23 6.42525 18.0748 1.5 12 1.5C5.92525 1.5 1 6.42525 1 12.5C1 18.5748 5.92525 23.5 12 23.5Z"
                        stroke="#CCCCCC" stroke-miterlimit="10"></path>
                      <path d="M16 8.5L8 16.5" stroke="#666666" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                      <path d="M16 16.5L8 8.5" stroke="#666666" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    </svg>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr class="border-t border-gray-400">
                <td class="px-2 py-2" colspan="3">
                  <button
                    class="px-8 cursor-pointer py-3.5 bg-[#f2f2f2] rounded-[43px] text-[#4c4c4c] text-sm font-semibold className leading-[16px]">
                    Return to shop
                  </button>
                </td>
                <td class="px-2 py-2" colspan="2">
                  <button
                    class="px-8 py-3.5 cursor-pointer bg-[#f2f2f2] rounded-[43px] text-[#4c4c4c] text-sm font-semibold className leading-[16px]">
                    Update Cart
                  </button>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="w-[424px] bg-white rounded-lg p-6">
          <h2 class="text-[#191919] mb-2 text-xl font-medium leading-[30px]">
            Cart Total
          </h2>
          <div class="w-[376px] py-3 justify-between items-center flex">
            <span class="text-[#4c4c4c] text-base font-normal leading-normal">Total:</span><span id="cart-total"
              class="text-[#191919] text-base font-semibold leading-tight">{{ number_format($cartItems->sum(fn($i) => $i->perfume->price * $i->quantity), 2) }}€</span>
          </div>
          <div class="w-[376px] py-3 shadow-[0px_1px_0px_0px_rgba(229,229,229,1.00)] justify-between items-center flex">
            <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]">Shipping:</span><span
              class="text-[#191919] text-sm font-medium leading-[21px]">Free</span>
          </div>
          <div class="w-[376px] py-3 shadow-[0px_1px_0px_0px_rgba(229,229,229,1.00)] justify-between items-center flex">
            <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]">Subtotal:</span><span id="cart-subtotal"
              class="text-[#191919] text-sm font-medium leading-[21px]">{{ number_format($cartItems->sum(fn($i) => $i->perfume->price * $i->quantity), 2) }}€</span>
          </div>
          <button type="submit"
            class="w-[376px] text-white mt-5 px-10 py-4 bg-[#00b206] rounded-[44px] gap-4 text-base font-semibold leading-tight">
            Proceed to checkout
          </button>
        </div>
      </div>
    </form>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const csrfToken = '{{ csrf_token() }}';

      // Recalcula el total sumando solo los items con checkbox marcado
      function recalculateTotal() {
        let total = 0;
        const activeCheckboxes = document.querySelectorAll('input[name="items[]"]');
        activeCheckboxes.forEach(cb => {
          if (cb.checked) {
            const subtotalText = document.getElementById('subtotal-' + cb.value).textContent;
            total += parseFloat(subtotalText.replace('€', '').trim());
          }
        });
        const formatted = total.toFixed(2) + '€';
        document.getElementById('cart-total').textContent = formatted;
        document.getElementById('cart-subtotal').textContent = formatted;
      }

      function updateQuantity(url, newQty, itemId) {
        fetch(url, {
          method: 'PATCH',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: JSON.stringify({ quantity: newQty }),
        })
          .then(res => res.json())
          .then(data => {
            // Actualiza cantidad y subtotal de la fila
            document.getElementById('qty-' + itemId).textContent = data.quantity;
            document.getElementById('subtotal-' + itemId).textContent = data.subtotal + '€';
            // Recalcula el total respetando los checkboxes marcados
            recalculateTotal();
          });
      }

      // Botones SUMAR
      document.querySelectorAll('.btn-plus').forEach(btn => {
        btn.addEventListener('click', function () {
          const itemId = this.dataset.id;
          const currentQty = parseInt(document.getElementById('qty-' + itemId).textContent);
          updateQuantity(this.dataset.url, currentQty + 1, itemId);
        });
      });

      // Botones RESTAR
      document.querySelectorAll('.btn-minus').forEach(btn => {
        btn.addEventListener('click', function () {
          const itemId = this.dataset.id;
          const currentQty = parseInt(document.getElementById('qty-' + itemId).textContent);
          if (currentQty > 1) {
            updateQuantity(this.dataset.url, currentQty - 1, itemId);
          }
        });
      });

      // Checkboxes — recalcula al marcar/desmarcar
      document.addEventListener('change', function (e) {
        if (e.target && e.target.name === 'items[]') {
          recalculateTotal();
        }
      });

      // Botón eliminar (usando delegación de eventos para el SVG)
      document.addEventListener('click', function (e) {
        const btnDelete = e.target.closest('.btn-delete');
        if (btnDelete) {
          const itemId = btnDelete.dataset.id;
          const url = btnDelete.dataset.url;

          if (confirm('¿Estás seguro de que deseas eliminar este perfume del carrito?')) {
            fetch(url, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
              }
            })
              .then(res => res.json())
              .then(data => {
                if (data.success) {
                  const row = document.getElementById('row-' + itemId);
                  if (row) {
                    row.remove();
                  }
                  recalculateTotal();
                }
              })
              .catch(err => console.error('Error al eliminar:', err));
          }
        }
      });

      // Validar al enviar el formulario
      const form = document.getElementById('checkout-form');
      if (form) {
        form.addEventListener('submit', function (e) {
          const checkedCount = document.querySelectorAll('input[name="items[]"]:checked').length;
          if (checkedCount === 0) {
            e.preventDefault();
            alert('Debes seleccionar al menos un artículo para realizar el pago.');
          }
        });
      }

      // Calcular el total inicial según los checkboxes (todos marcados por defecto)
      recalculateTotal();
    });
  </script>

</x-layout>