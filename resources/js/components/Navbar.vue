<template>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <!-- <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="15"
            alt="MDB Logo"
            loading="lazy"
          />
        </a> -->
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <Link class="nav-link" href="/">Discussion</Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/">Questions</Link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Answered Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Unanswered Questions</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Notifications -->
        <div class="dropdown">
          <a
            class="text-reset me-3 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger"
              >1</span
            >
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </div>

        <!-- Icon -->
        <div v-if="!auth_user">
          <a class="text-reset me-3" href="#">
            <Link href="/user/login" class="fas fa-sign-in-alt"></Link>
          </a>
        </div>

        <!-- Avatar -->
        <div class="dropdown" v-if="auth_user">
          <a
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="#"
            id="navbarDropdownMenuAvatar"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              :src="/storage/ + auth_user.avatar"
              class="rounded-circle"
              height="25"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuAvatar"
          >
            <li>
              <a class="dropdown-item" href="#">{{ auth_user.name }}</a>
            </li>
            <li>
              <Link class="dropdown-item" href="user/setting">Settings</Link>
            </li>
            <li>
              <Link class="dropdown-item" href="/user/logout">Logout</Link>
            </li>
          </ul>
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>

  <div v-if="success">
    <div class="alert alert-primary text-center">
      {{ success }} <span v-if="auth_user">{{ auth_user.name }}</span>
    </div>
  </div>

  <!-- Navbar -->
</template>

<script>
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/runtime-core";
export default {
  props: ["auth_user", "success"],
  components: { Link },
  setup() {
    const success = computed((_) => usePage().props.value.success);

    return { success };
  },
};
</script>

<style scoped>
</style>
