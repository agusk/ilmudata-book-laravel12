<template>
    <AppLayout :breadcrumbs="breadcrumbs">
      <Head :title="`Product: ${product.name}`" />
  
      <div class="container mx-auto p-4 max-w-xl">
        <h1 class="text-2xl font-bold mb-4">Product Detail</h1>
  
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4 space-y-4 text-gray-900 dark:text-white">
          <div><strong>Name:</strong> {{ product.name }}</div>
          <div><strong>Price:</strong> ${{ product.price }}</div>
          <div><strong>Description:</strong> {{ product.description }}</div>
          <div class="mt-4">
            <router-link
              to="/products"
              class="text-blue-600 hover:underline"
            >
              ← Back to Products
            </router-link>
          </div>
        </div>
      </div>
    </AppLayout>
  </template>
  
  <script>
  import { ref } from 'vue';
  import AppLayout from '@/layouts/AppLayout.vue';
  
  export default {
    components: { AppLayout },
    props: {
      product: Object,
    },
    setup(props) {
      const breadcrumbs = ref([
        { title: 'Products', href: '/products' },
        { title: 'Detail Product', href: `/products/${props.product.id}` },
      ]);
  
      return { breadcrumbs, product: props.product };
    },
  };
  </script>