<template>
  <div class="create">
    <div class="container my-5">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h3>Login Your Account</h3>
            </div>
            <div class="card-body">
              <form @submit.prevent="loginAccount">
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
                  <button class="btn btn-sm btn-primary">Login</button>
                </div>
              </form>

              <p>
                not a member? <Link href="/user/create">sign up</Link> here.
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
      email: null,
      password: null,
    });

    let loginAccount = () => {
      Inertia.post("/user/login", form);
    };

    return { loginAccount, form };
  },
};
</script>

<style>
</style>
