<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Restore scroll position
            if (localStorage.getItem('scrollPosition')) {
                window.scrollTo(0, localStorage.getItem('scrollPosition'));
                localStorage.removeItem('scrollPosition');
            }

            // Store scroll position before form submission
            document.querySelectorAll('form').forEach(function(form) {
                form.addEventListener('submit', function() {
                    localStorage.setItem('scrollPosition', window.scrollY);
                });
            });
        });
    </script>
    <title>Product Catalog</title>
    <style>
        [x-cloak] {
            display: none;
        }
        body {
            background-color: #1a202c; /* Dark blue background */
            color: #e2e8f0; /* Light text color */
        }
        .bg-primary-700 {
            background-color: #2d3748; /* Darker blue */
        }
        .bg-primary-600 {
            background-color: #4a5568; /* Dark blue */
        }
        .bg-primary-500 {
            background-color: #718096; /* Medium blue */
        }
        .hover\:bg-orange-300:hover {
            background-color: #f6ad55; /* Orange */
        }
        .bg-orange-400 {
            background-color: #ed8936; /* Orange */
        }
        .hover\:bg-orange-400:hover {
            background-color: #f6ad55; /* Orange */
        }
        .text-gray-900 {
            color: #e2e8f0; /* Light text color */
        }
        .text-gray-800 {
            color: #e2e8f0; /* Light text color */
        }
        .bg-gray-50 {
            background-color: #2d3748; /* Darker blue */
        }
        .border-gray-300 {
            border-color: #4a5568; /* Dark blue */
        }
        .dark\:bg-gray-900 {
            background-color: #1a202c; /* Dark blue background */
        }
        .dark\:bg-gray-800 {
            background-color: #2d3748; /* Darker blue */
        }
        .dark\:text-white {
            color: #e2e8f0; /* Light text color */
        }
        .dark\:text-gray-400 {
            color: #a0aec0; /* Light gray text color */
        }
        .dark\:border-gray-700 {
            border-color: #4a5568; /* Dark blue */
        }
        .dark\:bg-primary-200 {
            background-color: #4a5568; /* Dark blue */
        }
        .dark\:text-primary-800 {
            color: #e2e8f0; /* Light text color */
        }
        .hover\:bg-gray-200:hover {
            background-color: #4a5568; /* Dark blue */
        }
        .hover\:text-gray-900:hover {
            color: #e2e8f0; /* Light text color */
        }
        .hover\:bg-gray-600:hover {
            background-color: #4a5568; /* Dark blue */
        }
        .hover\:text-white:hover {
            color: #e2e8f0; /* Light text color */
        }
    </style>
</head>
<body x-data="{ open: false, product: {} }" class="bg-gray-200">

    <x-navbar></x-navbar>
   
    <section class="py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                    <div class="hover:bg-slate-800 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="w-full">
                            <p class="text-xs text-gray-800 dark:text-gray-400">
                                {{ $product->brand }}
                            </p>
                            <div class="flex items-center justify-between gap-4">
                                <a href="#" class="text-2xl font-bold leading-tight text-gray-900 hover:underline dark:text-white">
                                    {{ $product->name }}
                                </a>
                            </div>
                            <p class="text-sm text-gray-800 dark:text-gray-300">
                                {{ $product->description }}
                            </p>
                        </div>
                        <div class=" pt-4">
                            <div class="flex flex-col items-between justify-between">
                                @foreach ($product->types as $type)
                                    <div class="flex flex-row w-full items-center justify-between">
                                        <span class="bg-{{ $type->color }}-100 w-1/2 mr-10 hover:underline text-orange-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                            #{{ $type->name }}
                                        </span>
                                        <div class="w-1/2 text-right text-xs text-gray-800 dark:text-gray-400 italic">
                                            {{ $type->description }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4 flex items-center justify-between gap-4">
                                <p class="w-1/2 text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">${{ $product->price }}</p>
                                <div class="flex items-center gap-2 w-1/2">
                                    <button @click="open = true; product = {{ json_encode($product) }}; console.log(product)" type="button" class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium hover:bg-orange-300 focus:outline-none focus:ring-4 bg-orange-400">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                        </svg>
                                        customize
                                    </button>
                                    <form action="{{ route('products.delete', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium hover:bg-red-300 focus:outline-none focus:ring-4 bg-red-400">
                                            <svg class="w-1/2 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-white">Customize Item</h2>
            <form action="{{ route('products.edit') }}" method="POST">
                @csrf <!-- Add CSRF token for security -->
                <input type="hidden" name="id" x-model="product.id">

                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                    <input type="text" name="name" id="name" x-model="product.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required>
                </div>
                
                <!-- Brand Selection -->
                <div>
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <select name="brand" id="brand" x-model="product.brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                        <option value="Dell">Dell</option>
                        <option value="HP">HP</option>
                        <option value="Lenovo">Lenovo</option>
                        <option value="Apple">Apple</option>
                        <option value="Acer">Acer</option>
                        <option value="Asus">Asus</option>
                        <option value="Microsoft">Microsoft</option>
                        <option value="Razer">Razer</option>
                    </select>
                </div>
        
                <!-- Price -->
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="float" name="price" id="price" x-model="product.price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="699" required>
                </div>
        
                <!-- Category Selection -->
                <div>
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select name="type" id="type" x-model="product.types[0].name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                        <option selected="" disabled>Select Type</option>
                        <option value="Gaming PC">Gaming PC</option>
                        <option value="Workstation">Workstation</option>
                        <option value="All-in-One">All-in-One</option>
                        <option value="Mini PC">Mini PC</option>
                        <option value="Desktop">Desktop</option>
                        <option value="Laptop">Laptop</option>
                    </select>
                </div>
        
                <!-- Description -->
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea name="description" id="description" x-model="product.description"rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Enter product description" required></textarea>
                </div>

                <div class="flex justify-end mt-5">
                    <button type="button" @click="open = false" class="mr-2 inline-flex justify-center rounded-md border border-transparent bg-gray-600 px-4 py-2 text-sm font-medium text-gray-400 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</button>
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-orange-500 px-4 py-2 text-sm font-medium text-white hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- drawer component -->
    <div id="drawer-create-product-default" class="fixed bottom-0 left-0 z-40 w-full h-screen max-h-xs p-4 overflow-y-auto transition-transform translate-y-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Create A New Product</h5>
        <button type="button" data-drawer-dismiss="drawer-create-product-default" aria-controls="drawer-create-product-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close menu</span>
        </button>
        <form action="{{ route('products.add') }}" method="POST">
            @csrf <!-- Add CSRF token for security -->
            <div class="space-y-4">
                <!-- Product Name -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required>
                </div>
                
                <!-- Brand Selection -->
                <div>
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <select name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                        <option value="Dell">Dell</option>
                        <option value="HP">HP</option>
                        <option value="Lenovo">Lenovo</option>
                        <option value="Apple">Apple</option>
                        <option value="Acer">Acer</option>
                        <option value="Asus">Asus</option>
                        <option value="Microsoft">Microsoft</option>
                        <option value="Razer">Razer</option>
                    </select>
                </div>
        
                <!-- Price -->
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="float" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="699" required>
                </div>
        
                <!-- Category Selection -->
                <div>
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                        <option selected="" disabled>Select Type</option>
                        <option value="Gaming PC">Gaming PC</option>
                        <option value="Workstation">Workstation</option>
                        <option value="All-in-One">All-in-One</option>
                        <option value="Mini PC">Mini PC</option>
                        <option value="Desktop">Desktop</option>
                        <option value="Laptop">Laptop</option>
                    </select>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Enter product description" required></textarea>
                </div>
        
                <!-- Submit Button -->
                <div class="flex justify-center w-full pb-4 space-x-4">
                    <button type="submit" class=" w-full justify-center bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Product</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>