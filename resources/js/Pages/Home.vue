<template>
  <div class="home">
    <Master :auth_user="auth_user" :categories="categories">
      <div v-for="question in questions.data" :key="question.id">
        <Questions :question="question" :auth_user="auth_user" />
      </div>
      <Pagination :links="questions.links" />
    </Master>
  </div>
</template>

<script>
import Pagination from "../components/Pagination";
import Questions from "./Questions";
import Master from "../Layout/Master";
export default {
  props: ["auth_user", "categories", "questions"],
  components: {
    Pagination,
    Questions,
    Master,
  },
};
</script>

<style>
</style>
