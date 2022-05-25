<template>
  <!-- Navbar Section  -->
  <div class="container-fluid mb-3" :auth_user="auth_user">
    <div class="row">
      <Navbar :auth_user="auth_user" />
    </div>
  </div>

  <!-- Ask Question and Categories Section  -->
  <div class="master container">
    <div class="row">
      <div class="col-md-3">
        <div class="row">
          <button class="btn btn-primary" @click="askQuestion">
            Ask Question
          </button>
        </div>
        <div class="mt-2">
          <AllCategories :categories="categories" />
        </div>
      </div>
      <div class="col-md-9">
        <!-- alert-->
        <div class="alert alert-primary text-center" v-if="success">
          {{ success }} <span v-if="auth_user">{{ auth_user.name }}</span>
        </div>
        <div class="alert alert-danger text-center" v-if="danger">
          {{ danger }}
        </div>
        <div class="alert alert-warning text-center" v-if="create_success">
          {{ create_success }}
        </div>
        <!--end alert-->
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import AllCategories from "../components/AllCategories";
import Navbar from "../components/Navbar";
import { computed } from "@vue/runtime-core";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
  props: ["auth_user", "categories", "danger", "success", "create_success"],
  components: {
    AllCategories,
    Navbar,
  },
  setup() {
    const success = computed(() => usePage().props.value.success);
    const danger = computed(() => usePage().props.value.danger);
    const create_success = computed(() => usePage().props.value.create_success);

    let askQuestion = () => {
      Inertia.get("/question/create");
    };

    return { success, danger, create_success, askQuestion };
  },
};
</script>

<style scoped>
</style>
