<script setup>
import { usePasswordToggle } from '@/Composables/usePasswordToggle';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import { ref } from 'vue';
import AuthLayout from '@/Layouts/AuthLayout.vue';
import SubmitButton from '@/Shared/Buttons/SubmitButton.vue';
import InputLabel from '@/Shared/Forms/InputLabel.vue';
import TextInput from '@/Shared/Forms/TextInput.vue';
import InputError from '@/Shared/Forms/InputError.vue';
import Checkbox from '@/Shared/Forms/Checkbox.vue';

const errors = ref([]);

const page = usePage();
const status = page.props.flash.status

const form = useForm({
  userLogin: '',
  password: '',
  remember: false
});

const { showPassword, password, togglePassword } = usePasswordToggle();

const validate = () => {
  form.clearErrors();

  if (!form.userLogin) form.setError('userLogin', 'Email is required');
  if (!form.password) form.setError('password', 'Password is required');

  return Object.keys(form.errors).length === 0;
}

const submitLogin = () => {
  errors.value = [];
  form.clearErrors();

  if (!validate()) return;

  // const cookies = Cookies.get("cookies_accepted");
  // if (!cookies) {
  //   alert("⚠️ Debes aceptar las cookies antes de iniciar sesión.");
  //   return;
  // }

  form.post(route('send-login'), {
    onFinish: () => {
      form.reset('password')
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
  });
}

const navigateTo = (url) => {
  window.location.href = url;
}

const loginWithGoogle = () => {
  const width = 500;
  const height = 600;
  const left = (screen.width / 2) - (width / 2);
  const top = (screen.height / 2) - (height / 2);

  const popup = window.open(
    route('google'),
    'GoogleLogin',
    `width=${width},height=${height},top=${top},left=${left}`
  );

  window.addEventListener('message', (e) => {
    if (e.origin !== window.location.origin) return;
    if (e.data.success) {
      location.reload();
    } else {
      alert(e.data.message);
    }
  });
}

</script>

<template>
  <AuthLayout title="sign in">
    <div class="auth-form-box">
      <div class="text-center mb-7">
        <div v-if="status" class="mb-4 font-medium text-sm text-warning">
          {{ status }}
        </div>

        <h3 class="text-body-highlight">Iniciar sesión</h3>
        <p class="text-body-tertiary">Obtenga acceso a su cuenta</p>
      </div>

      <div class="box-handler d-flex justify-content-center flex-column gap-2">
        <button @click="navigateTo(route('google'))" :loading="form.processing" loading-text="Starting" class="btn btn-phoenix-secondary w-100">
          <span class="fab fa-google text-danger me-2 fs-8"></span>
          Inicia sesión con Google
        </button>

        <button @click="navigateTo(route('facebook'))" :loading="form.processing" loading-text="Starting" class="btn btn-phoenix-secondary w-100">
          <span class="fab fa-facebook text-primary me-2 fs-8"></span>
          Inicia sesión con facebook
        </button>

        <button @click="navigateTo(route('github'))" :loading="form.processing" loading-text="Starting" class="btn btn-phoenix-secondary w-100">
          <span class="fab fa-github text-white me-2 fs-8"></span>
          Inicia sesión con Github
        </button>
      </div>

      <div class="position-relative">
        <hr class="bg-body-secondary mt-5 mb-4" />
        <div class="divider-content-center bg-body-emphasis">O utilice el correo electrónico</div>
      </div>

      <form @submit.prevent="submitLogin">
        <div class="mb-3 text-start">
          <InputLabel for="email" value="Nombre de usuario o correo electrónico" />
          <div class="form-icon-container">
            <TextInput class="form-icon-input" type="text" id="userLogin" name="userLogin" v-model="form.userLogin" placeholder="Enter user or email" />
            <span class="fas fa-user text-body fs-9 form-icon"></span>
          </div>
          <InputError class="mt-1 text-sm" :message="form.errors.userLogin" />
        </div>

        <div class="mb-3 text-start">
          <InputLabel for="password" value="Contraseña" />
          <div class="form-icon-container" data-password="data-password">
            <TextInput class="form-control form-icon-input pe-6" :type="showPassword ? 'text' : 'password'" id="password" name="password" v-model="form.password" placeholder="Contraseña" />
            <span class="fas fa-key text-body fs-9 form-icon"></span>

            <button type="button" class="btn p-0 px-3 pe-2 pt-1 position-absolute top-0 end-0 fs-7 flex items-center text-body-tertiary" @click="togglePassword">
              <span class="uil" :class="showPassword ? 'uil-eye-slash' : 'uil-eye'"></span>
            </button>

            <InputError class="mt-1 text-sm" :message="form.errors.password" />
          </div>
        </div>

        <div class="row flex-between-center mb-7">
          <div class="col-auto">
            <div class="form-check mb-0">
              <Checkbox class="form-check-input" type="checkbox" name="remember" id="checkbox" v-model:checked="form.remember" />
              <InputLabel class="form-check-label mb-0" for="checkbox" value="Recuérdame" />
            </div>
          </div>
          <div class="col-auto">
            <Link class="fs-9 fw-semibold" :href="route('forgot-password')">¿Olvidaste tu contraseña?</Link>
          </div>
        </div>

        <SubmitButton :loading="form.processing" loading-text="Starting session" type="submit" class="w-100 mb-3">Iniciar sesión</SubmitButton>
      </form>

      <div class="text-center">
        <Link :href="route('sign-up')">Crea una cuenta</Link>
      </div>
    </div>
  </AuthLayout>
</template>