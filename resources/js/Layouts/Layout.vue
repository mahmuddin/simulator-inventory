<script setup></script>
<template>
  <Head>
    <meta
      head-key="description"
      name="description"
      content="This is default description"
    />
  </Head>
  <div>
    <header class="bg-indigo-500 text-white">
      <nav class="flex items-center justify-between p-4 max-w-screen-lg mx-auto">
        <div class="space-x-6">
          <!-- <Link href="/">Home</Link>
          <Link href="/about">About</Link> -->
          <Link :href="route('home')">Home</Link>
        </div>
      </nav>
    </header>

    <main class="p-4">
      <slot />
    </main>
  </div>
</template>
