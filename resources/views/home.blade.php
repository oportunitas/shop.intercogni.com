<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Document</title>
    
</head>
<body class="bg-gray-200">

    <x-navbar></x-navbar>
   
    <section class="py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $item)
                    <div class="hover:bg-orange-200 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="h-56 w-full">
                            <div class="flex items-center justify-between gap-4">
                                <a href="#" class="text-lg font-bold leading-tight text-gray-900 hover:underline dark:text-white">
                                    {{ $item->brand->brand_name }}
                                </a>
                                <p class="text-sm font-medium {{ $item->stock_quantity <= 20 ? 'text-red-500' : 'text-gray-600' }}">
                                    Stock: {{ $item->stock_quantity }}
                                </p>
                            </div>
                            
                            <a href="#">
                                <img class="mx-auto h-full dark:hidden"  src="https://i.ibb.co.com/S5bHHhH/shoespng-parspng-com.png" alt="{{ $item->product_name }}"/>
                            </a>
                        </div>
                        <div class="pt-6">
                            
                           <div class="mt-4 flex items-center justify-between gap-4">
                            <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white"> {{ ucfirst($item->product_name)}}</a>
                            <span class="ml-auto bg-{{ $item->category->color }}-100 hover:underline text-orange-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                #{{ $item->category->category_name }}
                            </span>
                           </div>
                            <div class="mt-4 flex items-center justify-between gap-4">
                                <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">${{ $item->price }}</p>
                                <button type="button" class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium hover:bg-green-300 focus:outline-none focus:ring-4 bg-green-400">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                      </svg>
                                    Edit this item
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- drawer component -->
<div id="drawer-create-product-default" class="fixed top-0 left-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">New Product</h5>
    <button type="button" data-drawer-dismiss="drawer-create-product-default" aria-controls="drawer-create-product-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf <!-- Add CSRF token for security -->
        <div class="space-y-4">
            <!-- Product Name -->
            <div>
                <label for="pro_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                <input type="text" name="pro_name" id="pro_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required>
            </div>
            
            <!-- Brand Selection -->
            <div>
                <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                <select name="brand_id" id="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                    <option value="1">Dell</option>
                    <option value="2">HP</option>
                    <option value="3">Lenovo</option>
                    <option value="4">Apple</option>
                    <option value="5">Acer</option>
                    <option value="6">Asus</option>
                    <option value="7">Microsoft</option>
                    <option value="8">Razer</option>
                </select>
            </div>
    
            <!-- Price -->
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required>
            </div>
    
            <!-- Category Selection -->
            <div>
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                    <option selected="" disabled>Select Category</option>
                    <option value="1">Gaming PC</option>
                    <option value="2">Workstation</option>
                    <option value="3">All-in-One</option>
                    <option value="4">Mini PC</option>
                    <option value="5">Desktop</option>
                    <option value="6">Laptop</option>
                </select>
            </div>
    
            <!-- Description -->
            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Enter product description" required></textarea>
            </div>
    
            <!-- Submit Button -->
            <div class="flex justify-center w-full pb-4 space-x-4">
                <button type="submit" class=" w-full justify-center bg-green-500 hover:bg-red-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Product</button>
            </div>
        </div>
    </form>
    
    
</div>
    
   
</body>
</html>