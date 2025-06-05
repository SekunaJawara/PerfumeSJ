<template>
  <div class="max-w-8xl mx-auto p-8">
    <h1 class="text-3xl font-bold text-center mb-8">Comparador de Perfums</h1>
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
      <table class="min-w-full table-auto text-base text-gray-800">
        <thead>
          <tr class="bg-gray-100 text-center text-base font-semibold">
            <th class="p-4 border-b w-40"></th>
            <th
              v-for="(perfume, index) in perfumes"
              :key="index"
              class="p-4 border-b align-top"
            >
              <div class="flex flex-col items-center">
                <img
                  :src="`/storage/${perfume.logo}`"
                  alt="Perfume"
                  class="w-32 h-auto object-contain mb-2"
                />
                <span class="text-lg font-bold text-center">{{ perfume.Name }}</span>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(row, index) in attributes"
            :key="index"
            class="border-t hover:bg-gray-50"
          >
            <td class="p-4 font-semibold text-left bg-gray-50 w-40">
              {{ row.label }}
            </td>
            <td
              v-for="(perfume, i) in perfumes"
              :key="i"
              class="p-4 text-left align-middle"
            >
              <template v-if="row.key === 'logo'">
                <img
                  :src="`/storage/${perfume[row.key]}`"
                  alt="Logo"
                  class="h-16 mx-auto"
                />
              </template>
              <template v-else-if="row.key === 'description'">
                <p class="text-justify">{{ perfume[row.key] }}</p>
              </template>
              <template v-else>
                {{ perfume[row.key] }}
              </template>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  props: ['perfumes'],
  computed: {
    attributes() {
      return [
        { label: 'Marca', key: 'Brand' },
        { label: 'Descripción', key: 'Description' },
        { label: 'Precio', key: 'price' },
        { label: 'Notas principales', key: 'notas_principales' },
        { label: 'Logo', key: 'logo' }
      ];
    }
  }
};
</script>
