import AppLayout from '@/layouts/app-layout'
import { Head } from '@inertiajs/react'
import { type BreadcrumbItem } from '@/types'

export default function ProductShow({ product }: { product: any }) {
  const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Products', href: '/products' },
    { title: 'Detail Product', href: `/products/${product.id}` },
  ]

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title={`Product: ${product.name}`} />

      <div className="container mx-auto p-4 max-w-xl">
        <h1 className="text-2xl font-bold mb-4">Product Detail</h1>

        <div className="bg-white dark:bg-gray-800 rounded shadow p-4 space-y-4 text-gray-900 dark:text-white">
          <div><strong>Name:</strong> {product.name}</div>
          <div><strong>Price:</strong> ${product.price}</div>
          <div><strong>Description:</strong> {product.description}</div>
          <div className="mt-4">
            <a
              href="/products"
              className="text-blue-600 hover:underline"
            >
              ← Back to Products
            </a>
          </div>
        </div>
      </div>
    </AppLayout>
  )
}
