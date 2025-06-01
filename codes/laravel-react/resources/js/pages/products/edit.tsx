import AppLayout from '@/layouts/app-layout'
import { Head, useForm } from '@inertiajs/react'
import { type BreadcrumbItem } from '@/types'

export default function ProductEdit({ product }: { product: any }) {
    const breadcrumbs: BreadcrumbItem[] = [
        { title: 'Products', href: '/products' },
        { title: 'Edit Product', href: `/products/${product.id}/edit` }
      ]
      
  const { data, setData, put, processing, errors } = useForm({
    name: product.name,
    price: product.price,
    description: product.description || '',
  })

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()
    put(`/products/${product.id}`)
  }

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Edit Product" />
      <div className="container mx-auto p-4 max-w-xl">
        <h1 className="text-2xl font-bold mb-4">Edit Product</h1>

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
            className="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
            disabled={processing}
          >
            Update
          </button>
        </form>
      </div>
    </AppLayout>
  )
}
