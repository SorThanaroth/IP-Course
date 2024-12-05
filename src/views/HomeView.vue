<template>
    <div class="Wrapper">
    <div class="Container" v-for="categories in categoryComponent">
      <categoryComponent
        key="1"
        :name="categories.name"
        :productCount="categories.productCount"
        :color="categories.color"
        :image="categories.image"
      />
    </div>
  </div>
  <div class="wrapper2">
    <div class="PromotionContainer" v-for="promotions in promotionComponent">
      <promotionComponent
        :title="promotions.title"
        :url="promotions.url"
        :color="promotions.color"
        :buttonColor="promotions.buttonColor"
        :image="promotions.image"
      />
    </div>
  </div>
  <div id="wrapper3">
      <menuComponent
      />
  </div>
  <!-- <menuComponent :title="'Popular Products'" :nav="productStore.groups ? productStore.groups : []"/> -->

  <div class="wrapper4">
    <div class="ProductContainer" v-for="products in productComponent">
      <productComponent
      :key="2"
      :name="products.name"
      :rating="products.ratimg"
      :size="products.size"
      :image="products.image"
      :price="products.price"
      :promotionAsPercentage="products.promotionAsPercentage"
      :categoryId="products.categoryId"
      :instock="products.instock"
      :countSold="products.countSold"
      :group="products.group"
      />
    </div>
  </div> 

</template>
<script>
import categoryComponent from "../components/categoryComponent.vue";
import promotionComponent from "../components/promotionComponent.vue";
import { RouterView } from "vue-router";
import axios from "axios";
import menuComponent from "@/components/menuComponent.vue";
import productComponent from "@/components/productComponent.vue";
import { useProductStore } from "@/stores/product";
import { onMounted } from "vue";
import { mapState } from "pinia";

// export default {
//   components: {
//     categoryComponent,
//     promotionComponent, 
//     productComponent,
//     menuComponent,
//   },
//   setup() {
//     const productStore = useProductStore();
//     onMounted(() => {
//       productStore.fetchGroups();
//       productStore.fetchCategories();
//       productStore.fetchPromotions();
//       productStore.fetchProducts();
//     });
//     return { productStore };
//   },
//   computed:{
//     ...mapState(useProductStore, {
//       groups: 'groups',
//       categories: 'categories',
//       promotions: 'promotions',
//       products: 'products',
//     })
//   },
// };
export default {
  components: {
    categoryComponent,
    promotionComponent,
    menuComponent,
    productComponent,
  },

  data() {
    return {
      categoryComponent: [],
      promotionComponent: [],
      menuComponent: [],
      productComponent: [],

    };
  },
  mounted() {
    // fetch data categories, promotions from backend
    this.fetchCategories()
    this.fetchPromotions()
    this.fetchProducts()
  },
  methods: {
    fetchCategories(){
      axios.get("http://localhost:3000/api/categories").then((response) => {
        this.categoryComponent = response.data;
        console.log(this.categories);
      })
      .catch((error) => {
        console.error("Error fetching categories:", error); // Handle errors
      });
    },

    fetchPromotions(){
      axios.get("http://localhost:3000/api/promotions").then((response) => {
        this.promotionComponent = response.data;
        console.log(this.promotions);
      })
      .catch((error) => {
        console.error("Error fetching promotions:", error); // Handle errors
      });
      
    },

    fetchProducts() {
      axios.get("http://localhost:3000/api/products").then((response) => {
        this.productComponent = response.data;
        console.log(this.products);
      })
      .catch((error) => {
        console.error("Error fetching products:", error);
      });
    }

  },
};
</script>

<style scoped>
.Wrapper {
  display: flex;
  width: 100vw;
  padding: 25px 20px;
  
}

.Container {
  width: 80%;
  display: flex;
  justify-content: space-evenly;
  margin-bottom: 10px;
  
}

.PromotionContainer {
  width: 80%;
  display: flex;
  justify-content: space-evenly;
}
.wrapper2{
  display: flex;
}
.wrapper3 {
  display: flex;
}
.wrapper4 {
  /* display: flex; */
  grid-template-columns: repeat(auto-fill, minmax(300px, 2fr));
  display: grid;
}
.ProductContainer {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
}
</style>