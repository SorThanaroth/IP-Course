<template>
    <div class="buttonContainer">
        <button type="button" 
        :style="{backgroundColor: color}"
        class="btn"
        >
            <img :src="picture" alt="item picture" width="70px" height="70px" />
            <div class="text">
                <span class="ItemName">{{ name }}</span>
                <span class="ItemQuantity">{{ quantity }}</span>
            </div>
        </button>
    </div>
    {{ items }}
</template>

<script>
    export default {
        props: {
        color: String,
        name: String,
        quantity: String,
        picture: String,
        items: Array,
        },
    };
</script>

<style scoped>
    .buttonContainer {
        display: flex;
        align-items: center;
    }

    .btn{
        height: 110px;
        width: 80px;
        border: solid 1px;
        border-radius: 10px;
    }

    .text{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .ItemName{
        color: #253D4E;
        font-family:cursive;
        font-size: 10px;
        font-weight: bold;
    }

    .ItemQuantity{
        color: #B6B6B6;
        font-size: 8px;
    }
</style>