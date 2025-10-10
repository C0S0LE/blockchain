<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import SubmitButton from '@/Shared/Buttons/SubmitButton.vue';
import InputError from '@/Shared/Forms/InputError.vue';
import TextInput from '@/Shared/Forms/TextInput.vue';
import { Link, useForm } from '@inertiajs/vue3';
import icon from '@template/assets/img/icons/logo.png';
import { ref } from 'vue';

defineProps({
  data: {
    type: [Array, Object],
    default: () => ({})
  },
  status: {
    type: [Boolean, String],
    default: false
  }
});

const errors = ref([]);
const form = useForm({ email: '' });

const validate = () => {
  form.clearErrors();
  if (!form.email) form.setError('email', 'Email is required');
  return Object.keys(form.errors).length === 0;
}

const sendForgot = () => {
  errors.value = [];
  form.clearErrors();

  if (!validate()) return;

  form.post(route('auth.send-forgot'), {
    onFinish: () => form.reset('email'),
    onError: (err) => {
      errors.value = Object.values(err).flat();
    }
  });
};

</script>

<template>
  <AuthLayout title="Forgot password">
    <div class="auth-form-box">
      <div class="text-center">
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
          {{ status }}
        </div>

        <h4 class="text-body-highlight">¿Olvidaste tu contraseña?</h4>
        <p class="text-body-tertiary mb-4">
          Ingrese su correo electrónico a continuación y lo haremos enviarte un enlace de reinicio
        </p>
        <form @submit.prevent="sendForgot" class="mb-2">
          <TextInput v-model="form.email" id="email" type="email" class="block w-full form-control rounded-0" placeholder="Correo electrónico" />
          <InputError class="mt-1 text-end" :message="form.errors.email" />
          <SubmitButton :loading="form.processing" loadingText="Sending" type="submit" class="rounded-0 w-100 mt-4">Send
          </SubmitButton>
        </form>
        <Link :href="route('welcome')" class="fs-9 fw-bold">Still having problems?</Link>
      </div>
    </div>
  </AuthLayout>
</template>