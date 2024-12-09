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

        <div v-if="$page.props.auth.user">
          <Link
            :href="route('logout')"
            method="post"
            as="button"
            type="button"
            class="nav-link"
            >Logout</Link
          >
        </div>
        <div v-else class="space-x-6">
          <Link :href="route('register')" class="nav-link">Register</Link>
          <Link :href="route('login')" class="nav-link">Login</Link>
        </div>
      </nav>
    </header>

    <main class="p-4">
      <slot />
    </main>
  </div>
</template>
