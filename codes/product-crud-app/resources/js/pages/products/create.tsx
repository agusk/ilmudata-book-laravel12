import AppLayout from '@/layouts/app-layout'
import { Head, useForm } from '@inertiajs/react'
import { type BreadcrumbItem } from '@/types'

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Products', href: '/products' },
    { title: 'Create Product', href: '/products/create' }
  ]
  

export default function ProductCreate() {
  const { data, setData, post, processing, errors } = useForm({
    name: '',
    price: '',
    description: '',
  })

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()
    post('/products')
  }

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Create Product" />
      <div className="container mx-auto p-4 max-w-xl">
        <h1 className="text-2xl font-bold mb-4">Create Product</h1>

        <form onSubmit={handleSubmit} className="space-y-4">
          <div>
            <input
              type="text"
              className="form-input w-full"
              placeholder="Product name"
              value={data.name}
              onChange={(e) => setData('name', e.target.value)}
            />
            {errors.name && <div className="text-red-500 text-sm">{errors.name}</div>}
          </div>

          <div>
            <input
              type="text"
              className="form-input w-full"
              placeholder="Price"
              value={data.price}
              onChange={(e) => setData('price', e.target.value)}
            />
            {errors.price && <div className="text-red-500 text-sm">{errors.price}</div>}
          </div>

          <div>
            <textarea
              className="form-textarea w-full"
              placeholder="Description"
              value={data.description}
              onChange={(e) => setData('description', e.target.value)}
            />
            {errors.description && <div className="text-red-500 text-sm">{errors.description}</div>}
          </div>

          <button
            type="submit"
            className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            disabled={processing}
          >
            Save
          </button>
        </form>
      </div>
    </AppLayout>
  )
}
