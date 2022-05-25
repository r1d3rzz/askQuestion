<template>
  <SettingLayout :auth_user="auth_user">
    <div>
      <div v-if="questions.length">
        <h3>Total Questions : {{ questions.length }}</h3>
        <div v-for="question in questions" :key="question">
          <div class="card mb-3">
            <div
              class="
                card-body
                d-flex
                justify-content-between
                align-items-center
              "
            >
              <div>
                <b>Title : {{ question.title }}</b>
              </div>
              <div>
                <Link
                  :href="route('question.detail', question.slug)"
                  class="btn btn-dark btn-sm"
                  >View</Link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="card">
        <div class="card-header text-center">
          <h2 class="display-6">No Questions</h2>
        </div>
      </div>
    </div>
  </SettingLayout>
</template>

<script>
import Questions from "../Questions";
import SettingLayout from "../../Layout/SettingLayout";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: ["auth_user", "questions"],
  components: {
    Questions,
    SettingLayout,
    Link,
  },
};
</script>

<style>
</style>
