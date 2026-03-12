<template>
  <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:#f5f5f5">
  
  <div style="width:400px;background:white;padding:30px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.1)">
  
  <h2 style="text-align:center;margin-bottom:20px">Login</h2>
  
  <form @submit.prevent="submit">
  
  <div style="margin-bottom:15px">
  <label>Email</label>
  <input
  v-model="form.email"
  type="email"
  required
  style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px"
  />
  </div>
  
  <div style="margin-bottom:15px">
  <label>Password</label>
  <input
  v-model="form.password"
  type="password"
  required
  style="width:100%;padding:8px;border:1px solid #ccc;border-radius:4px"
  />
  </div>
  
  <div style="margin-bottom:15px">
  <label>
  <input type="checkbox" v-model="form.remember">
  Remember me
  </label>
  </div>
  
  <button
  type="submit"
  style="width:100%;padding:10px;background:#111;color:white;border:none;border-radius:4px"
  >
  Log in
  </button>
  
  </form>
  
  </div>
  
  </div>
  </template>
  
  <script>
  import { useForm } from '@inertiajs/vue3'
  
  export default {
  
  setup(){
  
  const form = useForm({
  email:'',
  password:'',
  remember:false
  })
  
  function submit(){
  form.post('/login')
  }
  
  return { form, submit }
  
  }
  
  }
  </script>