import AppLayout from '@/layouts/app-layout'
import { Head, Link, usePage } from '@inertiajs/react'
import { type BreadcrumbItem } from '@/types'

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Products', href: '/products' },
]

export default function ProductIndex({ products }: { products: any[] }) {
    const { flash } = usePage().props as { flash?: { success?: string } }

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Products" />

      <div className="container mx-auto p-4">
        {flash?.success && <div className="bg-green-100 text-green-800 p-2 mb-4 rounded">{flash.success}</div>}

        <div className="flex justify-between items-center mb-4">
          <h1 className="text-2xl font-bold">Products</h1>
          <Link
            href="/products/create"
            className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
          >
            Create
          </Link>
        </div>

        <div className="overflow-x-auto">
            <table className="min-w-full bg-white dark:bg-gray-800 shadow rounded-lg text-sm">
                <thead>
                <tr className="bg-gray-200 dark:bg-gray-700 text-left text-gray-800 dark:text-gray-100">
                    <th className="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Name</th>
                    <th className="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Price</th>
                    <th className="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Description</th>
                    <th className="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Actions</th>
                </tr>
                </thead>
                <tbody>
                {products.map((product) => (
                    <tr
                    key={product.id}
                    className="hover:bg-gray-100 dark:hover:bg-gray-700 border-b border-gray-200 dark:border-gray-600 text-gray-800 dark:text-gray-100"
                    >
                    <td className="py-2 px-4">{product.name}</td>
                    <td className="py-2 px-4">${product.price}</td>
                    <td className="py-2 px-4">{product.description}</td>
                    <td className="py-2 px-4 flex gap-2">
                        <Link
                        href={route('products.show', product.id)}
                        className="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded text-xs mr-2"
                        >
                        Detail
                        </Link>

                        <Link
                        href={`/products/${product.id}/edit`}
                        className="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs"
                        >
                        Edit
                        </Link>
                        <Link
                        href={route('products.destroy', product.id)}
                        method="delete"
                        as="button"
                        className="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs"
                        onClick={(e) => {
                            if (!confirm('Are you sure you want to delete this product?')) e.preventDefault()
                        }}
                        >
                        Delete
                        </Link>
                    </td>
                    </tr>
                ))}
                </tbody>
            </table>
        </div>

      </div>
    </AppLayout>
  )
}
