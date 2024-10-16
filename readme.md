# 🌐 `shop.intercogni.com`
> `shop.intercogni.com`'s purpose is to be a website to display a catalogue of PCs to purchase on a store.

> The website is created using `Laravel`, the full-stack highly-opinionated web-programming framework.

# 📚 Table of Contents

# ✨ Features
- 🛒 **Product Catalogue**: Display a list of PCs available for purchase.
- 🖥️ **Product Details**: View detailed information about each product.
- 📱 **Responsive Design**: Optimized for both desktop and mobile devices.

# 🗂️ Database/Model Diagram
![alt text](public/database_diagram.png)

# 🎥 Demo Video
![demo_video](public/demo_video.webm)
> The demo video can otherwise be accessed by downloading the file at `public/demo_video.webm`

# 📸 Screenshots

## 🏠 Main Page
![Main Page](public/ss.main_page.png)
> The main page of the website showcasing the product catalogue.

## ✏️ Editing
![Editing](public/ss.editing.png)
> Interface for editing the details of a product.

## ✅ After Editing
![After Editing](public/ss.after_editing.png)
> View of the product after the details have been successfully edited.

## ➕ Before Addition
![Before Addition](public/ss.before_addition.png)
> The state of the product list before adding a new product.

## ➕ Adding
![Adding](public/ss.adding.png)
> Interface for adding a new product to the catalogue.

## ✅ After Addition
![After Addition](public/ss.after_addition.png)
> View of the product list after a new product has been added.

## ❌ After Deletion
![After Deletion](public/ss.after_deletion.png)
> The state of the product list after a product has been deleted.

# ⚙️ Installation

1. 📥 Clone the repository:
	```sh
	git clone git@github.com:oportunitas/shop.intercogni.com.git
	cd shop.intercogni.com
	```

2. 📦 Install dependencies:
	```sh
	composer install
	npm install
	```

3. 📄 Import the `.env` file, **please ask the code owner** for the `.env` file

4. 🔑 Generate the application key:
	```sh
	php artisan key:generate
	```

5. 🗄️ Run database migrations:
	```sh
	php artisan migrate
	```

6. 🛠️ Build the Vite Frontend helper through npm:
	```sh
	npm run build
	```

6. 🚀 Start the development server:
	```sh
	php artisan serve
	```

## 🌐 API Endpoints
- `POST` `/products/add`: ➕ add a product into the database
- `POST` `/products/edit`: ✏️ edit one or more properties of an existing product (id is embedded in json of request for streamlining)
- `DELETE` `/products/delete/{id}`: ❌ delete an existing product from the database