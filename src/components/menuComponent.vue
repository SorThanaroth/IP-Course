<template>
  <div class="product-list">
    <div class="categories">
      <div class="header">
        <h2>Popular Products</h2>
      </div>
      <button v-for="category in categories" :key="category.id" :class="{ active: selectedCategory === category.name }"
        @click="filterByCategory(category.name)"
      >
        {{ category.name }}
      </button>
    </div>
  </div>
</template>
  
<script>
import axios from "axios";
  
  export default {
    data() {
      return {
        products: [],
        categories: [],
        selectedCategory: "All",
      };
    },
    computed: {
      filteredProducts() {
        if (this.selectedCategory === "All") {
          return this.products;
        }
        return this.products.filter(
          (product) => product.group === this.selectedCategory
        );
      },
    },
    created() {
      this.fetchProducts();
      this.fetchCategories();
    },
    methods: {
      async fetchProducts() {
        try {
          const response = await axios.get("YOUR_API_ENDPOINT");
          this.products = response.data;
        } catch (error) {
          console.error("Error fetching products:", error);
        }
      },
      async fetchCategories() {
        this.categories = [
          { id: 0, name: "All" },
          { id: 1, name: "Milks & Dairies" },
          { id: 2, name: "Coffees & Teas" },
          { id: 3, name: "Pet Foods" },
          { id: 4, name: "Meats"},
          { id: 5, name: "Vegetables"},
          { id: 6, name: "Fruits"},
          // Add other categories as needed
        ];
      },
      filterByCategory(category) {
        this.selectedCategory = category;
      },
    },
  };
</script>
  
<style>
  .product-list {
    padding: 20px;
    margin: 20px;
  }
  .categories {
    display: flex;
    gap: 10px;
    margin-bottom: 70px;
  }
  .categories button {
    padding: 10px 15px;
    background: #f3f3f3;
    border: none;
    cursor: pointer;
    border-radius: 4px;
  }
  .categories .active {
    background: #277af6;
    color: #fff;
  }
  .header {
    margin: 20px 20px;
  }
  .products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
  }
  .product-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    background: #fff;
  }
  .product-image img {
    width: 100%;
    height: auto;
  }
  .product-info {
    padding: 10px;
  }
  .product-name {
    font-size: 16px;
    font-weight: bold;
  }
  .product-price {
    font-size: 14px;
    margin: 5px 0;
  }
  .discounted-price {
    color: #007bff;
    font-weight: bold;
  }
  .original-price {
    text-decoration: line-through;
    margin-left: 5px;
    color: #999;
  }
  .add-to-cart-btn {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
  }
</style>

<!-- <template>
    <header class="menuContainer">
        <nav>
            <ul>
                <li class="feature"> {{ title }}</li>
                <li>All</li>
                <li class="options" v-for="(item, index) in nav" :key="index">{{ item }}</li>
              </ul>
        </nav>
    </header>
  </template>
  <script>
  export default {
    name: 'menuComponent',
    // props: ["title", "nav"],
    prop: {
      title: String,
      nav: String,
    }
  }
  </script>
  <style >
  .menuContainer {
    max-width: 1650px;
    margin-top: 20px;
    margin-left: -30px;
    display: flex;
    flex-direction: column;
    font-family: 'Trebuchet MS', sans-serif;
  }
  ul {
    list-style: none;
    display: flex;
  }
  li {
    color: white;
    text-decoration: none;
    color: #0c3548;
  }
  .options{
    margin-left: 20px;
    margin-right: 30px;
  }
  .feature {
    margin-right: auto;
    font-size: 20px;
    font-weight: bold;
  }
  </style> -->