import axios from "axios";
import { defineStore } from "pinia";

export const useProductStore = defineStore('product', {
    state: () => ({
         groups: [],
         promotions: [],
         categories: [],
         products: []
    }),

    getters: {
            getCategoriesByGroup: (state) => {
                return (groupName) => state.categories.find((category) => category.group === groupName)
            },
            getProductsByGroup: (state) => {
                return (groupName) => state.products.find((product) => product.group === groupName)
            },
            getProductsByCategory: (state) => {
                return (categoryId) => state.categories.find((category) => category.group === categoryId)
            },
            getPopularProducts: (state) => {
                return (state.products.find((product) =>  product.countSold >= 10))
            },
        },
        
    actions: {
    async fetchCategories() {
      try {
        const response = await axios.get('http://localhost:3000/api/categories');
        this.categories = response.data;
        console.log(this.categories);
      } catch (error) {
        console.error('Error fetching categories:', error);
      }
    },

    async fetchPromotions() {
      try {
        const response = await axios.get('http://localhost:3000/api/promotions');
        this.promotions = response.data;
        console.log(this.promotions);
      } catch (error) {
        console.error('Error fetching promotions:', error);
      }
    },

    async fetchProducts() {
        try {
          const response = await axios.get('http://localhost:3000/api/products');
          this.products = response.data;
          console.log(this.products);
        } catch (error) {
          console.error('Error fetching products:', error);
        }
      },

      async fetchGroups() {
        try {
          const response = await axios.get('http://localhost:3000/api/groups');
          this.groups = response.data;
          console.log(this.groups);
        } catch (error) {
          console.error('Error fetching groups:', error);
        }
      },
    },
  })