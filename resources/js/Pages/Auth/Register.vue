<template>
    <div style="text-align:center;padding:50px">
      <h2>Register</h2>
      <form @submit.prevent="register">
        <input v-model="name" type="text" placeholder="Name" style="margin:10px;padding:8px"><br>
        <input v-model="email" type="email" placeholder="Email" style="margin:10px;padding:8px"><br>
        <input v-model="password" type="password" placeholder="Password" style="margin:10px;padding:8px"><br>
        <input v-model="password_confirmation" type="password" placeholder="Confirm Password" style="margin:10px;padding:8px"><br>
        <button type="submit" style="padding:10px 20px;margin-top:10px">Register</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const name = ref('')
  const email = ref('')
  const password = ref('')
  const password_confirmation = ref('')
  
  function register() {
    alert(`Name: ${name.value}, Email: ${email.value}`)
    // Here you can call axios POST /register or Inertia form
  }
  </script>