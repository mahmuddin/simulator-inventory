<script setup>
defineProps({
  user: String,
});
</script>
<template>
  <!-- <Head title=" | About" /> -->
  <Head :title="` | ${$page.component}`" />
  <div>
    <h1>About Page {{ user }}</h1>
  </div>
</template>
