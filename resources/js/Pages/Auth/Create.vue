<template>
  <div class="create">
    <div class="container my-5">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h3>Create Your Account</h3>
            </div>
            <div class="card-body">
              <form
                @submit.prevent="createAccount"
                enctype="multipart/form-data"
              >
                <div class="inputBox mb-3">
                  <label for="name">Name</label>
                  <input
                    type="text"
                    v-model="form.name"
                    id="name"
                    class="form-control"
                    :class="[errors.name ? 'border border-danger' : '']"
                  />
                  <small class="text-danger" v-if="errors.name">{{
                    errors.name
                  }}</small>
                </div>

                <div class="inputBox mb-3">
                  <label for="username">Username</label>
                  <input
                    type="text"
                    v-model="form.username"
                    id="username"
                    class="form-control"
                    :class="[errors.username ? 'border border-danger' : '']"
                  />
                  <small class="text-danger" v-if="errors.username">{{
                    errors.username
                  }}</small>
                </div>

                <div class="inputBox mb-3">
                  <label for="name">Email</label>
                  <input
                    type="email"
                    v-model="form.email"
                    id="email"
                    class="form-control"
                    :class="[errors.email ? 'border border-danger' : '']"
                  />
                  <small class="text-danger" v-if="errors.email">{{
                    errors.email
                  }}</small>
                </div>

                <div class="inputBox mb-3">
                  <label for="profile">Profile</label>
                  <input
                    type="file"
                    @input="form.avatar = $event.target.files[0]"
                    id="profile"
                    class="form-control"
                    :class="[errors.avatar ? 'border border-danger' : '']"
                  />
                  <small class="text-danger" v-if="errors.avatar">{{
                    errors.avatar
                  }}</small>
                </div>

                <div class="inputBox mb-3">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    v-model="form.password"
                    id="password"
                    class="form-control"
                    :class="[errors.password ? 'border border-danger' : '']"
                  />
                  <small class="text-danger" v-if="errors.password">{{
                    errors.password
                  }}</small>
                </div>

                <div class="inputBox d-flex justify-content-end">
                  <button class="btn btn-sm btn-primary">Create</button>
                </div>
              </form>

              <p>
                Already have account?
                <Link href="/user/login">login</Link> here.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useForm, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
  props: ["errors"],
  components: { Link },
  setup() {
    const form = useForm({
      name: null,
      username: null,
      email: null,
      avatar: null,
      password: null,
    });

    let createAccount = () => {
      Inertia.post("/user/create", form);
    };

    return { createAccount, form };
  },
};
</script>

<style>
</style>
