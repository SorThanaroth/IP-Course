<template>
    <div class="container">
        <button type="button" :style="{backgroundColor: color}" class="btn">
            <div class="wrapper">
                <span class="text">{{ title }}</span>
                <Button @click="shopNow(text)">Shop Now</Button>
            </div>
            <img :src="image" alt="item picture" class="item-picture" />
        </button>
    </div>

</template>

<script>
    import Button from './buttonComponent.vue';

    export default {
        components: {
            Button,
        },

        props: {
            title: String,
            url: String,
            color: String,
            image: String,
        },

        methods:{
            shopNow(title) {
             alert("Let's shop: "+ this.title);
            }
        }
    };
</script>

<style scoped>
    .btn{
        display: grid;
        grid-template-columns: 2fr 1fr;
        grid-template-rows: 1fr;

        height: 170px;
        width: 300px;
        border: solid 1px;
        border-radius: 10px;
        padding-left: 20px;
    }

    .btn:hover{
        transform: scale(1.05);
    }

    .wrapper{
        display: grid;
        grid-template-rows: 70% 30%;
        gap: 10px;
        justify-content: center;
        align-self:center;
        padding-left: 10px;
    }

    .text{
        color: #253D4E;
        font-family:cursive;
        font-size: 13px;
        font-weight: bold;
        text-align: left;
    }

    .item-picture {
        display: flex;
        align-self: self-end;
        max-width: 150px;
        max-height: 150px;
    }
</style>