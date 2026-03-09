<template>
    <div>
      <h1>Admin Dashboard</h1>
      <p>Welcome, {{ authUser.name }}</p>
      <Link href="/">Go to Home</Link>
    </div>
  </template>
  
  <script>
  import { Link } from '@inertiajs/vue3';
  export default {
    name: 'AdminPage',
    props: { auth_user: Object },
    computed: {
      authUser() { return this.auth_user }
    },
    components: { Link }
  }
  </script>