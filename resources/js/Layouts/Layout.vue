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
    <header>
      <nav>
        <div class="space-x-6">
          <!-- <Link href="/">Home</Link>
          <Link href="/about">About</Link> -->
          <Link :href="route('home')" class="nav-link">Home</Link>
        </div>

        <div class="space-x-6">
          <Link :href="route('register')" class="nav-link">Register</Link>
        </div>
      </nav>
    </header>

    <main class="p-4">
      <slot />
    </main>
  </div>
</template>
