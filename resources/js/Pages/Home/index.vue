<template>
  <div>
    <header>
      <nav>
        <Link href="/">Home</Link>
        <Link href="/login" v-if="!authUser">Login</Link>
        <Link href="/register" v-if="!authUser">Register</Link>
        <form method="POST" action="/logout" v-else>
          @csrf
          <button type="submit">Logout</button>
        </form>
      </nav>
    </header>

    <section>
      <h2>Our Rooms</h2>
      <div v-for="room in rooms" :key="room.id">
        <img :src="room.image" />
        <h3>{{room.name}}</h3>
        <p>{{room.desc}}</p>
      </div>
    </section>

    <section>
      <ContactForm />
    </section>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

</script>