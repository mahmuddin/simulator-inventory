<script setup>
import PaginationLinks from "./Components/PaginationLinks.vue";
defineProps({
  users: Object,
});

// Format Date
const getDate = (date) =>
  new Date(date).toLocaleDateString("id-ID", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });
</script>
<template>
  <!-- <Head title=" | Home" /> -->
  <Head :title="` | ${$page.component}`" />
  <div>
    <table>
      <thead>
        <tr class="bg-slate-300">
          <th>Avatar</th>
          <th>Name</th>
          <th>Email</th>
          <th>Registration Date</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users.data" :key="user.id">
          <td>
            <img
              :src="
                user.avatar ? 'storage/' + user.avatar : 'storage/avatars/default.png'
              "
              class="avatar"
              alt=""
            />
          </td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ getDate(user.created_at) }}</td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination Links -->
    <div>
      <PaginationLinks :paginator="users" />
    </div>
  </div>
</template>
