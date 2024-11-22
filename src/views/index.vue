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
</template>
<script>
import categoryComponent from "../components/categoryComponent.vue";
import promotionComponent from "../components/promotionComponent.vue";
import { RouterView } from "vue-router";
import axios from "axios";

export default {
  components: {
    categoryComponent,
    promotionComponent,
  },

  data() {
    return {
      categoryComponent: [],
      promotionComponent: [],
    };
  },
  mounted() {
    // fetch data categories, promotions from backend
    this.fetchCategories()
    this.fetchPromotions()
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
</style>