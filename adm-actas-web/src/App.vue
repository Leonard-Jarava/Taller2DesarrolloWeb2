<template>

  <header class="bg-sky-900 py-4 mb-8">

    <!-- Título -->
    <div class="container mx-auto flex items-center justify-between" >
      <h1 class="text-white text-2xl font-bold">SISTEMA DE GESTIÓN DE ACTAS</h1>
    </div>

    <!-- Enlaces -->
    <nav class=" container mx-auto mt-4">
      <ul class="flex space-x-4">
        <li>
          <RouterLink :to="{name: 'home'}" class="flex rounded p-2  text-white hover:underline" :class="{'bg-sky-600/45': route.name === 'home'}" >
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" ><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M8 11v-5a4 4 0 0 1 8 0" /></svg>
            login
          </RouterLink>
        </li>
        <li>
          <RouterLink :to="{name: 'actas'}" class="flex rounded p-2  text-white hover:underline" :class="{'bg-sky-600/45': route.name === 'actas'}" >
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M15 15m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
              <path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5" />
              <path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73" />
              <path d="M6 9l12 0" />
              <path d="M6 12l3 0" />
              <path d="M6 15l2 0" />
            </svg>
            Actas
          </RouterLink>
        </li>
        <li>
          <RouterLink :to="{name: 'usuarios'}" class="flex rounded p-2  text-white hover:underline" :class="{'bg-sky-600/45': route.name === 'usuarios'}" >
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
            </svg>

            Usuarios
          </RouterLink>
        </li>
        

      </ul>
    </nav>

  </header>

  <main>
    <RouterView />
  </main>
</template>
<script setup>
import { RouterView } from 'vue-router'
import { useRoute } from 'vue-router';

const route = useRoute();

</script>
