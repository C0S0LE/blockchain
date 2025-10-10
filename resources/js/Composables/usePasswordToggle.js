import { ref } from 'vue';

export function usePasswordToggle() {
  const showPassword = ref(false);
  const password = ref('');

  const togglePassword = () => {
    showPassword.value = !showPassword.value;
  };

  return {
    showPassword,
    password,
    togglePassword,
  };
}
