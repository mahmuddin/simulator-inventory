<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
});

const submit = () => {
  console.log(form);
  form.post(route("register"), {
    onError: () => form.reset("password", "password_confirmation"),
  });
};
</script>
<template>
  <Head title="Register" />

  <h1 class="title">Register a new account</h1>

  <div class="w-2/4 mx-auto"></div>

  <form @submit.prevent="submit">
    <TextInput name="name" v-model="form.name" :message="form.errors.name"> </TextInput>
    <TextInput
      name="email"
      type="email"
      v-model="form.email"
      :message="form.errors.email"
    ></TextInput>
    <TextInput
      name="password"
      type="password"
      v-model="form.password"
      :message="form.errors.password"
    ></TextInput>
    <TextInput
      name="confirm password"
      type="password"
      v-model="form.password_confirmation"
    ></TextInput>

    <div>
      <p class="text-slate-600 mb-2">
        Already have an account? <a :href="route('login')" class="text-link">Login</a>
      </p>
      <button class="primary-btn" :disabled="form.processing">Register</button>
    </div>
  </form>
</template>
