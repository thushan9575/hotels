<template>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
      <!-- Authentication Card -->
      <div class="w-full max-w-md bg-white shadow-md rounded-md p-6">
        <!-- Logo Slot -->
        <div class="flex justify-center mb-6">
          <img src="/public/images/logo.png" alt="Logo" class="h-16 w-16" />
        </div>
  
        <!-- Validation Errors -->
        <div v-if="errors.length" class="mb-4 bg-red-100 text-red-700 p-2 rounded">
          <ul>
            <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
          </ul>
        </div>
  
        <!-- Session Status -->
        <div v-if="status" class="mb-4 text-green-600">
          {{ status }}
        </div>
  
        <!-- Login Form -->
        <form @submit.prevent="submitLogin">
          <!-- Email -->
          <div>
            <label for="email" class="block text-gray-700">Email</label>
            <input
              id="email"
              type="email"
              v-model="form.email"
              required
              autofocus
              autocomplete="username"
              class="mt-1 block w-full border border-gray-300 rounded-md p-2"
            />
          </div>
  
          <!-- Password -->
          <div class="mt-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input
              id="password"
              type="password"
              v-model="form.password"
              required
              autocomplete="current-password"
              class="mt-1 block w-full border border-gray-300 rounded-md p-2"
            />
          </div>
  
          <!-- Remember Me -->
          <div class="flex items-center mt-4">
            <input
              id="remember_me"
              type="checkbox"
              v-model="form.remember"
              class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
            />
            <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
          </div>
  
          <!-- Submit & Forgot Password -->
          <div class="flex items-center justify-end mt-4">
            <inertia-link
              v-if="hasForgotPassword"
              :href="forgotPasswordUrl"
              class="underline text-sm text-gray-600 hover:text-gray-900 mr-4"
            >
              Forgot your password?
            </inertia-link>
  
            <button
              type="submit"
              class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700"
            >
              Log in
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    props: {
      status: String,
      hasForgotPassword: {
        type: Boolean,
        default: true,
      },
      forgotPasswordUrl: {
        type: String,
        default: '/forgot-password',
      },
    },
    data() {
      return {
        form: {
          email: '',
          password: '',
          remember: false,
        },
        errors: [],
      };
    },
    methods: {
      submitLogin() {
        this.errors = [];
  
        Inertia.post('/login', this.form, {
          onError: (errors) => {
            // Convert Laravel validation errors to array
            this.errors = Object.values(errors).flat();
          },
        });
      },
    },
  };
  </script>
  
  <style scoped>
  /* Optional: small UI tweaks */
  </style>