<script setup>
defineProps({
  user: String,
});
</script>
<template>
  <Head title="About" />
  <h1>About Page {{ user }}</h1>
</template>
