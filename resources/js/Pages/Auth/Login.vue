<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <FrontendLayout>

    <Head title="Log in" />
    <div
      class="mx-auto w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>

      <form @submit.prevent="submit">
        <div>
          <InputLabel for="email" value="Email" />

          <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
            autocomplete="username" />

          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
          <InputLabel for="password" value="Password" />

          <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
            autocomplete="current-password" />

          <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="block mt-4">
          <label class="flex items-center">
            <Checkbox name="remember" v-model:checked="form.remember" />
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
          </label>
        </div>

        <div class="flex items-center justify-end mt-4">
          <Link v-if="canResetPassword" :href="route('password.request')"
            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
          Forgot your password?
          </Link>

          <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Log in
          </PrimaryButton>
        </div>
      </form>

      <hr class="my-8" />

      <!-- create new account button -->
      <div class="flex flex-col items-center justify-center mt-4">
        <!-- New user? -->
        <span class="mr-2 text-sm text-gray-600 dark:text-gray-400">
          New user?
        </span>
        <Link :href="route('register')"
          class="underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
        Create an account
        </Link>
      </div>
    </div>
  </FrontendLayout>
</template>
