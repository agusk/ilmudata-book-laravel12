<template>
  <AppLayout :breadcrumbs="breadcrumbs">
    <Head title="Products" />

    <div class="container mx-auto p-4">
      <div v-if="flash.success" class="bg-green-100 text-green-800 p-2 mb-4 rounded">
        {{ flash.success }}
      </div>

      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Products</h1>
        <router-link
          to="/products/create"
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
        >
          Create
        </router-link>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800 shadow rounded-lg text-sm">
          <thead>
            <tr class="bg-gray-200 dark:bg-gray-700 text-left text-gray-800 dark:text-gray-100">
              <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Name</th>
              <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Price</th>
              <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Description</th>
              <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="product in products"
              :key="product.id"
              class="hover:bg-gray-100 dark:hover:bg-gray-700 border-b border-gray-200 dark:border-gray-600 text-gray-800 dark:text-gray-100"
            >
              <td class="py-2 px-4">{{ product.name }}</td>
              <td class="py-2 px-4">${{ product.price }}</td>
              <td class="py-2 px-4">{{ product.description }}</td>
              <td class="py-2 px-4 flex gap-2">
                <router-link
                  :to="`/products/${product.id}`"
                  class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded text-xs mr-2"
                >
                  Detail
                </router-link>

                <router-link
                  :to="`/products/${product.id}/edit`"
                  class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs"
                >
                  Edit
                </router-link>
                <button
                  @click="deleteProduct(product.id)"
                  class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

export default {
  components: { AppLayout },
  setup() {
    const { flash, props } = usePage();
    const products = ref(props.products || []);
    const breadcrumbs = ref([{ title: 'Products', href: '/products' }]);

    const deleteProduct = (id) => {
      if (confirm('Are you sure you want to delete this product?')) {
        // Call API to delete product
      }
    };

    return { flash, products, breadcrumbs, deleteProduct };
  },
};
</script>