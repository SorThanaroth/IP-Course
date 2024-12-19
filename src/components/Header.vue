<template>
    <div class="header">
        <h3 class="feature">Header</h3>
        <nav>
            <a href="#" class="nav-link active">Page 1</a>
            <a href="#" class="nav-link">Page 2</a>
            <a href="#" class="nav-link">Page 3</a>
      </nav>
    </div>
  </template>
  
  <script>
  export default {
    name: "Header",
  };
  </script>
  
  <style scoped>
  .header {
    display: flex;
    width: 100%;
    justify-content: flex-end;
    padding: 10px;
    background-color: #f1f1f1;
    border-bottom: 1px solid #ccc;
    flex-direction: row;
  }

  .Header {
    justify-content: flex-start;
    align-items: left;
  }
  
  .nav-link {
    margin: 0 15px;
    text-decoration: none;
    color: black;
    font-size: 16px;
  }
  
  .nav-link.active {
    color: red;
    font-weight: bold;
  }
  </style>
  