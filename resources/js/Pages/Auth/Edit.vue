<template>
  <SettingLayout :auth_user="auth_user">
    <div class="alert alert-warning text-center" v-if="errors.errorNoti">
      {{ errors.errorNoti }}
    </div>
    <div class="userEdit">
      <div class="card">
        <div
          class="card-header d-flex justify-content-between align-items-center"
        >
          <div>
            <p class="display-6">Edit Your Profile</p>
          </div>
          <div>
            <img :src="'/storage/' + auth_user.avatar" width="150" alt="" />
          </div>
        </div>
        <div class="card-body">
          <form @submit.prevent="EditAcc" enctype="multipart/form-data">
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
              <label for="name">Email</label>
              <input
                type="email"
                v-model="form.email"
                id="email"
                class="form-control"
                readonly
              />
              <small class="text-primary"
                >you can edit exept email address.</small
              >
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
              <button class="btn btn-sm btn-primary">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </SettingLayout>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import SettingLayout from "../../Layout/SettingLayout";
import { Inertia } from "@inertiajs/inertia";
export default {
  props: ["auth_user", "errors"],
  components: { SettingLayout },
  setup(props) {
    const form = useForm({
      name: props.auth_user.name,
      email: props.auth_user.email,
      avatar: props.auth_user.avatar,
      password: null,
    });

    let EditAcc = () => {
      Inertia.post("/user/profile/edit/" + props.auth_user.id, form);
      form.password = null;
    };

    return { form, EditAcc };
  },
};
</script>

<style>
</style>
