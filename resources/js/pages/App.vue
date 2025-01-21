<!-- resources/js/components/App.vue -->
<template>
    <div class="flex h-screen w-full">
      <Sidebar/>
      <router-view></router-view> <!-- Render trang hiện tại tại đây -->
    </div>
  </template>
  
  <script>
import Sidebar from '../components/layouts/Sidebar.vue';
  export default {
    name: 'App',
    components: {
      Sidebar,
  },

  };
  </script>
  
  <style scoped>
  nav {
    margin-bottom: 20px;
  }
  
  ul {
    list-style-type: none;
    padding: 0;
  }
  
  li {
    display: inline;
    margin-right: 15px;
  }
  
  a {
    text-decoration: none;
    color: #42b983;
  }
  </style>
  