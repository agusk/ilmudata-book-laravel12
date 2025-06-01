<template>
  <AppLayout :breadcrumbs="breadcrumbs">
    <Head title="Create Product" />
    <div class="container mx-auto p-4 max-w-xl">
      <h1 class="text-2xl font-bold mb-4">Create Product</h1>

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
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
          :disabled="processing"
        >
          Save
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
  setup() {
    const { data, setData, post, processing, errors } = useForm({
      name: '',
      price: '',
      description: '',
    });

    const breadcrumbs = ref([
      { title: 'Products', href: '/products' },
      { title: 'Create Product', href: '/products/create' },
    ]);

    const handleSubmit = () => {
      post('/products');
    };

    return { data, setData, post, processing, errors, breadcrumbs, handleSubmit };
  },
};
</script>