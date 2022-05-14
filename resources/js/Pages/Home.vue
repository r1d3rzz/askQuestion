<template>
  <div class="home">
    <Master :auth_user="auth_user" :categories="categories">
      <div v-for="question in questions" :key="question.id">
        <Questions :question="question" :auth_user="auth_user" />
      </div>
    </Master>
  </div>
</template>

<script>
import Questions from "./Questions";
import Master from "../Layout/Master";
export default {
  props: ["auth_user", "categories", "questions"],
  components: {
    Questions,
    Master,
  },
};
</script>

<style>
</style>
