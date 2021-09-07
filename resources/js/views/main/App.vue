<template>
  <div>
    <navbar />
    <main class="py-4">
      <router-view />
    </main>
  </div>
</template>
<script>
import Navbar from './components/Navbar.vue';

export default {
  name: "App",
  components: { Navbar },
};
</script>
