<template>
  <div class="home">
    <Master :auth_user="auth_user">
      <div v-for="item in 3" :key="item">
        <Questions />
      </div>
    </Master>
  </div>
</template>

<script>
import Questions from "./Questions";
import Master from "../Layout/Master";
export default {
  props: ["auth_user"],
  components: {
    Questions,
    Master,
  },
};
</script>

<style>
</style>
