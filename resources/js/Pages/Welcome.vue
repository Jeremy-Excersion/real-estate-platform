<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <FrontendLayout>
      <div>
        <p class="text-gray-800 dark:text-gray-200">Welcome to your frontend page.</p>
        <Link href="/login" class="text-sm underline text-gray-800 dark:text-gray-200">Login</Link>
        <Link href="/register" class="ml-4 text-sm underline text-gray-800 dark:text-gray-200">Register</Link>
      </div>
    </FrontendLayout>

</template>

