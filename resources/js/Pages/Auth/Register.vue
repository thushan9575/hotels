<template>
  <div style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:#f5f5f5">
    <div style="width:400px; background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1)">

      <h2 style="text-align:center; margin-bottom:20px">Register</h2>

      <!-- Validation Errors -->
      <div v-if="Object.keys(form.errors).length" style="margin-bottom:15px; color:red; font-size:14px">
        <ul>
          <li v-for="(error, key) in form.errors" :key="key">{{ error }}</li>
        </ul>
      </div>

      <form @submit.prevent="submit">

        <!-- Name -->
        <div style="margin-bottom:15px">
          <label>Name</label>
          <input
            v-model="form.name"
            type="text"
            required
            autofocus
            autocomplete="name"
            style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px"
          />
        </div>

        <!-- Email -->
        <div style="margin-bottom:15px">
          <label>Email</label>
          <input
            v-model="form.email"
            type="email"
            required
            autocomplete="username"
            style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px"
          />
        </div>

        <!-- Password -->
        <div style="margin-bottom:15px">
          <label>Password</label>
          <input
            v-model="form.password"
            type="password"
            required
            autocomplete="new-password"
            style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px"
          />
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom:15px">
          <label>Confirm Password</label>
          <input
            v-model="form.password_confirmation"
            type="password"
            required
            autocomplete="new-password"
            style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px"
          />
        </div>

        <!-- Terms -->
        <div style="margin-bottom:15px">
          <label>
            <input type="checkbox" v-model="form.terms" required>
            I agree to the <a href="/terms" target="_blank">Terms of Service</a> and <a href="/policy" target="_blank">Privacy Policy</a>
          </label>
        </div>

        <button
          type="submit"
          style="width:100%; padding:10px; background:#111; color:white; border:none; border-radius:4px"
        >
          Register
        </button>

        <div style="text-align:center; margin-top:15px">
          <a href="/login" style="font-size:14px; text-decoration:underline; color:#555">Already registered?</a>
        </div>

      </form>

    </div>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3'

export default {
  setup() {
    const form = useForm({
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      terms: false
    })

    function submit() {
      form.post('/register')
    }

    return { form, submit }
  }
}
</script>