<script setup>
import { usePasswordToggle } from '@/Composables/usePasswordToggle';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { route } from 'ziggy-js';

import AuthLayout from '@/Layouts/AuthLayout.vue';
import InputError from '@/Shared/Forms/InputError.vue';
import TextInput from '@/Shared/Forms/TextInput.vue';
import InputLabel from '@/Shared/Forms/InputLabel.vue';
import SubmitButton from '@/Shared/Buttons/SubmitButton.vue';
import Checkbox from '@/Shared/Forms/Checkbox.vue';

const errors = ref([]);

const props = defineProps({
  status: {
    type: [Boolean, String],
    default: false
  },
});

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  terms_accepted: false
});

const { showPassword, password, togglePassword } = usePasswordToggle();

const validate = () => {
  form.clearErrors();

  if (!form.name) form.setError('name', 'Name is required!');
  if (!form.email) form.setError('email', 'Email is required!');
  if (!form.password) form.setError('password', 'Password is required!');

  if (!form.password_confirmation) {
    form.setError('password_confirmation', 'Confirm your password!');
  } else if (form.password !== form.password_confirmation) {
    form.setError('password_confirmation', 'Passwords do not match!');
  }

  if (!form.terms_accepted) form.setError('terms_accepted', 'Terms must be accepted!');

  return Object.keys(form.errors).length === 0;
};

const submitRegister = () => {
  errors.value = [];
  form.clearErrors();

  if (!validate()) return;

  form.post(route('send-register'), {
    onFinish: () => {
      console.log('object');
    },

    onError: (err) => {
      errors.value = Object.values(err).flat();
      // console.log('Login errors:', err);

      // if (errors.userLogin) {
      //   form.setError('userLogin', errors.userLogin);
      // }
      // if (errors.password) {
      //   form.setError('password', errors.password);
      // }
      // if (errors.userBlocked) {
      //   alert(errors.userBlocked);
      // }
    }
  })
}
</script>

<template>
  <AuthLayout title="sign up">
    <div class="auth-form-box">
      <div class="text-center mb-7">
        <h3 class="text-body-highlight">Regístrate</h3>
        <p class="text-body-tertiary">Crea tu cuenta hoy</p>
      </div>

      <form @submit.prevent="submitRegister">
        <div class="mb-3 text-start">
          <InputLabel class="form-label" for="name">Nombre completo</InputLabel>
          <div class="form-icon-container">
            <TextInput class="form-control form-icon-input" id="name" name="name" v-model="form.name" placeholder="Introduce tu nombre" />
            <span class="fas fa-user text-body fs-9 form-icon"></span>
            <InputError class="mt-1 text-sm" :message="form.errors.name" />
          </div>
        </div>

        <div class="mb-3 text-start">
          <InputLabel class="form-label" for="email">Dirección de correo electrónico</InputLabel>
          <div class="form-icon-container">
            <TextInput class="form-control form-icon-input" id="email" name="email" v-model="form.email" placeholder="name@example.com" />
            <span class="fas fa-envelope text-body fs-9 form-icon"></span>
            <InputError class="mt-1 text-sm" :message="form.errors.email" />
          </div>
        </div>

        <div class="mb-3 text-start">
          <InputLabel class="form-label" for="password">Contraseña</InputLabel>
          <div class="form-icon-container" data-password="data-password">
            <TextInput class="form-control form-icon-input pe-6" :type="showPassword ? 'text' : 'password'" id="password" name="password" v-model="form.password" placeholder="Contraseña" />
            <span class="fas fa-key text-body fs-9 form-icon"></span>

            <button type="button" class="btn p-0 px-3 pe-2 pt-1 position-absolute top-0 end-0 fs-7 flex items-center text-body-tertiary" @click="togglePassword">
              <span class="uil" :class="showPassword ? 'uil-eye-slash' : 'uil-eye'"></span>
            </button>

            <InputError class="mt-1 text-sm" :message="form.errors.password" />
          </div>
        </div>

        <div class="mb-3 text-start">
          <InputLabel for="confirm-password" value="Confirmar contraseña" />
          <div class="form-icon-container" data-password="data-password">
            <TextInput class="form-control form-icon-input pe-6" :type="showPassword ? 'text': 'password'" id="confirm-password" name="confirm-password" v-model="form.password_confirmation" placeholder="Confirmar Contraseña" />
            <span class="fas fa-key text-body fs-9 form-icon"></span>

            <button type="button" class="btn p-0 px-3 pe-2 pt-1 position-absolute top-0 end-0 fs-7 flex items-center text-body-tertiary" @click="togglePassword">
              <span class="uil" :class="showPassword ? 'uil-eye-slash' : 'uil-eye'"></span>
            </button>

            <InputError class="mt-1 text-sm" :message="form.errors.password_confirmation" />
          </div>
        </div>

        <div class="form-check mb-3">
          <Checkbox class="form-check-input" id="terms-accepted" name="terms-accepted" v-model="form.terms_accepted"/>

          <label class="form-check-label text-body" for="terms-accepted">Acepto los
            <Link :href="route('legal.terms')">términos</Link> y
            <Link :href="route('legal.policy')">política de privacidad</Link>
          </label>

          <InputError class="mt-1 text-sm" :message="form.errors.terms_accepted" />
        </div>

        <SubmitButton :loading="form.processing" loading-text="Registrando" type="submit" class="btn btn-primary w-100 mb-3">Regístrarme</SubmitButton>
      </form>

      <div class="text-center">
        <Link :href="route('login')">¿Ya tienes una cuenta?</Link>
      </div>
    </div>
  </AuthLayout>
</template>