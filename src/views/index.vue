<template>
    <div class="Wrapper">
    <div class="Container" v-for="category in categoryComponent">
      <categoryComponent
        key="1"
        :color="category.color"
        :name="category.name"
        :quantity="category.quantity"
        :picture="category.picture"
      />
    </div>
  </div>
  <div class="wrapper2">
    <div class="PromotionContainer" v-for="promotion in promotionComponent">
      <promotionComponent
        :key="promotion"
        :color="promotion.color"
        :text="promotion.text"
        :picture="promotion.picture"
      />
    </div>
  </div>
</template>
<script>
import categoryComponent from "../components/categoryComponent.vue";
import promotionComponent from "../components/promotionComponent.vue";
import { RouterView } from "vue-router";

export default {
  components: {
    categoryComponent,
    promotionComponent,
  },

  data() {
    return {
      categoryComponent: [
        {
          color: "#F2FCE4",
          name: "Hamburger",
          quantity: "14 items",
          picture: new URL("@/assets/Image/burger.png", import.meta.url),
        },
        {
          color: "#FFFCEB",
          name: "Peach",
          quantity: "17 items",
          picture: new URL("@/assets/Image/peach.png", import.meta.url),
        },
        {
          color: "#ECFFEC",
          name: "Oganic Kiwi",
          quantity: "21 items",
          picture: new URL("@/assets/Image/kiwi.png", import.meta.url),
        },
        {
          color: "#FEEFEA",
          name: "Red Apple",
          quantity: "68 items",
          picture: new URL("@/assets/Image/apple.png", import.meta.url),
        },
        {
          color: "#FFF3EB",
          name: "Snack",
          quantity: "34 items",
          picture: new URL("@/assets/Image/snack.png", import.meta.url),
        },
        {
          color: "#FFF3FF",
          name: "Black plum",
          quantity: "25 items",
          picture: new URL("@/assets/Image/plum.png", import.meta.url),
        },
        {
          color: "#F2FCE4",
          name: "Vegetable",
          quantity: "65 items",
          picture: new URL("@/assets/Image/vegetable.png", import.meta.url),
        },
        {
          color: "#FFFCEB",
          name: "Headphone",
          quantity: "33 items",
          picture: new URL("@/assets/Image/headPhone.png", import.meta.url),
        },

        {
          color: "#F2FCE4",
          name: "Chocolate",
          quantity: "54 items",
          picture: new URL("@/assets/Image/snack2.png", import.meta.url),
        },
        {
          color: "#FFF3FF",
          name: "Orange",
          quantity: "63 items",
          picture: new URL("@/assets/Image/orange.png", import.meta.url),
        },
      ],

      promotionComponent: [
        {
          color: "#F0E8D5",
          text: "Everyday Fresh & Clean with Our Products",
          picture: new URL("@/assets/Image/onion.png", import.meta.url),
        },
        {
          color: "#F3E8E8",
          text: "Make your Breakfast Healthy and Easy",
          picture: new URL("@/assets/Image/milk.png", import.meta.url),
        },
        {
          color: "#E7EAF3",
          text: "The best Organic Product Online",
          picture: new URL("@/assets/Image/vegetables.png", import.meta.url),
        },
      ],
    };
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