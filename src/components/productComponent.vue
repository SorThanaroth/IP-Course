<template>
    <div class="popularContainer">
        <button type="button" :style="{backgroundColor: color}" class="btn">
          <span class="discount" v-if="promotionAsPercentages>0">-{{ promotionAsPercentages }}%</span>
          <img :src="image" alt="image picture" width="190px" height="130px" border-radius="20px" object-fit="cover"/>
          <div class="info">
            <p class="groupName">Hado Foods</p>
            <h3 class="text">{{ name }}</h3>
            <p class="rating">&#11088&#11088&#11088&#11088 (4.0){{ rating }}</p>
            <p class="size">{{ size }}</p>
          </div>

          <div class="footer">
            <span class="price">${{ price }}</span>
            <button v-if="!isInvisible" class="addBtn" @click="quantity">Add</button>
            <input class="input" v-else type="number" placeholder="1">
          </div>
        </button> 
        
    </div>
</template>

<script>
import menuComponent from './menuComponent.vue';
    export default {
        components: {menuComponent},
        props: {
            name: String,
            rating: Float32Array,
            size: String,
            image: String,
            price: Float32Array,
            promotionAsPercentages: Float32Array,
            categoryId: Array,
            instock: Int16Array,
            countSold: Int16Array,
            group: String,
        },
        
        data() {
          return {
            isInvisible: false
          }
        },
        methods: {
          quantity() {
            this.isInvisible = true;
          }
        }
    }
</script>

<style scoped>
.popularContainer {
  padding: 20px;
  border-radius: 20px;
  background-color: white;
  align-items: center;
}
.btn {
  margin: 20px;
  padding: 16px;
  width: 228px;
  height: auto;
  border: 1px solid;
  border-radius: 5px;
  background-color: white;
  display: grid;
  transition: transform 0.3s ease;
}

.btn:hover {
  transform: scale(1.05);
}

.info {
  margin-top: -10px;
}

.discount {
  position: absolute;
  margin-left: -20px;
  background-color: rgb(48, 168, 48);
  color: white;
  width: 50px;
  text-align: center; 
  padding: 10px;   
  border-radius: 0px 20px 20px 0px;
}

.footer {
  display: flex;
  justify-content: space-between;
  color: #30a830;
  font-size: 25px;
  font-weight: bold;
}

.addBtn {
  padding: 5px;
  width: 70px;
  font-size: 15px;
  height: 30px;
  background-color: #b5e0b5;
  border: none;
  border-radius: 5px;
  color: #30a830;
  font-weight: bold;
  cursor: pointer;
}

.groupName {
  color: #777;
  padding: 20px 0px;
  margin-left: -100px;
}

.text {
  font-size: 1rem;
  margin: 10px 0;
}

.rating {
  margin-bottom: 5px;
  color: #777;
  font-weight: bold;
}

.size {
  font-size: 0.9rem;
  color: #777;
  margin-bottom: 10px;
}

.price {
  color: #4caf50;
  font-weight: bold;
}

.promotion {
  color: #777;
  text-decoration: line-through;
  font-size: 0.9rem;
}

.input{
  padding: 5px;
  width: 70px;
  font-size: 15px;
  height: 15px;
  border: none;
  border-radius: 5px;
  border: 1px solid #30a830;
  font-weight: bold;
  cursor: pointer;
}

</style>
