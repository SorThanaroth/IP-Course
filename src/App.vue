<template>
    <div class="Container">
      <Header />
      <div class="content">
        <aside class="menu">
          <h3>Menu</h3>
          <ul>
            <li>Section1</li>
            <li>Section2</li>
            <li>Section3</li>
            <li>Section4</li>
          </ul>
        </aside>
        <main class="Main">
          <h2>Welcome to Page1</h2>
        </main>
      </div>
      <Footer />
    </div>
</template>

<script>
import { RouterLink, RouterView } from 'vue-router'
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";


export default {
  name: "App",
  components: {
    Header,
    Footer
  }
};
</script>

<style>
body, html {
  margin: 0;
  padding: 0;
  height: 100%;
}

.container {
  display: flex;
  flex-direction: column;
  height: 100vh;
  position: relative;
}

.content {
  display: flex;
  flex: 1;
}

.menu {
  width: 200px;
  background-color: #f4f4f4;
  padding: 10px;
  border-right: 1px solid #ccc;
}

.menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu li {
  padding: 10px;
  border-bottom: 1px solid #ddd;
  cursor: pointer;
}

.main-content {
  padding: 20px;
  flex: 1;
}

footer {
  flex-shrink: 0;
}
</style>



