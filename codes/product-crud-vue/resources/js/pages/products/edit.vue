<template>
    <AppLayout :breadcrumbs="breadcrumbs">
      <Head title="Edit Product" />
      <div class="container mx-auto p-4 max-w-xl">
        <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
  
        <form @submit.prevent="handleSubmit" class="space-y-4">
          <div>
            <input
              type="text"
              v-model="form.name"
              class="form-input w-full"
              placeholder="Product name"
            />
            <div v-if="errors.name" class="text-red-500 text-sm">{{ errors.name }}</div>
          </div>
  
          <div>
            <input
              type="text"
              v-model="form.price"
              class="form-input w-full"
              placeholder="Price"
            />
            <div v-if="errors.price" class="text-red-500 text-sm">{{ errors.price }}</div>
          </div>
  
          <div>
            <textarea
              v-model="form.description"
              class="form-textarea w-full"
              placeholder="Description"
            ></textarea>
            <div v-if="errors.description" class="text-red-500 text-sm">{{ errors.description }}</div>
          </div>
  
          <button
            type="submit"
            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
            :disabled="processing"
          >
            Update
          </button>
        </form>
      </div>
    </AppLayout>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import AppLayout from '@/layouts/AppLayout.vue';
  
  export default {
    components: { AppLayout },
    props: {
      product: Object,
    },
    setup(props) {
      const { data, setData, put, processing, errors } = useForm({
        name: props.product.name,
        price: props.product.price,
        description: props.product.description || '',
      });
  
      const breadcrumbs = ref([
        { title: 'Products', href: '/products' },
        { title: 'Edit Product', href: `/products/${props.product.id}/edit` },
      ]);
  
      const handleSubmit = () => {
        put(`/products/${props.product.id}`);
      };
  
      return { data, setData, put, processing, errors, breadcrumbs, handleSubmit };
    },
  };
  </script>