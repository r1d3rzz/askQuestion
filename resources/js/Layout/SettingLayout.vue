<template>
  <!-- Navbar Section  -->
  <div class="container-fluid mb-3">
    <div class="row">
      <Navbar :auth_user="auth_user" />
    </div>
  </div>

  <!-- askQuestion and show user info -->
  <div class="master container">
    <div class="row">
      <div class="col-md-3">
        <div class="row">
          <Link href="/question/create" class="btn btn-primary"
            >Ask Question</Link
          >
        </div>
        <div class="mt-2">
          <div class="categories">
            <div class="card">
              <div class="card-header text-center">
                <h3>User Info</h3>
              </div>
              <div class="card-body">
                <Link href="/user/setting" class="list-group-item"
                  >Edit Profile</Link
                >
                <a href="#" class="list-group-item">Your Questions</a>
                <a href="#" class="list-group-item">Save Questions</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: ["auth_user"],
  components: { Navbar, Link },
};
</script>

<style>
</style>
