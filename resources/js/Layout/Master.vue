<template>
  <!-- Navbar Section  -->
  <div class="container-fluid mb-3">
    <div class="row">
      <Navbar :auth_user="auth_user" />
    </div>
  </div>

  <!-- Ask Question and Categories Section  -->
  <div class="master container">
    <div class="row">
      <div class="col-md-3">
        <div class="row">
          <button class="btn btn-primary">Ask Question</button>
        </div>
        <div class="mt-2">
          <Categories :categories="categories" />
        </div>
      </div>
      <div class="col-md-9">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "../components/Navbar";
import Categories from "../components/Categories.vue";
export default {
  props: ["auth_user", "categories"],
  components: {
    Navbar,
    Categories,
  },
};
</script>

<style scoped>
</style>
