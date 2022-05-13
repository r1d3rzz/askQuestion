<template>
  <div class="home">
    <Master>
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
  components: {
    Questions,
    Master,
  },
};
</script>

<style>
</style>
