<script setup></script>
<template>
  <!-- <Head title=" | Home" /> -->
  <Head :title="` | ${$page.component}`" />
  <div>
    <h1>{{ $page.component }}</h1>
    <h1>{{ $page.props.user }}</h1>

    <Link class="mt-[600px] block" href="/" preserve-scroll>Refresh</Link>
  </div>
</template>
