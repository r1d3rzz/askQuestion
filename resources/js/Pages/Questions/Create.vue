<template>
  <Master :auth_user="auth_user" :categories="categories">
    <div class="create">
      <div class="card">
        <div class="card-header">
          <h3>Create Question</h3>
        </div>
        <div class="card-body">
          <form @submit.prevent="createQuestion">
            <div class="inputBox mb-3">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" />
            </div>
            <div class="inputBox mb-3">
              <label for="slug">Slug</label>
              <input type="text" class="form-control" id="slug" />
            </div>
            <div class="inputBox mb-3">
              <label for="title">Body</label>
              <textarea
                type="text"
                rows="5"
                class="form-control"
                id="body"
              ></textarea>
            </div>
            <div class="inputBox mb-3">
              <label for="category">Category</label>
              <select id="category" class="form-control">
                <option
                  value=""
                  v-for="category in categories"
                  :key="category.id"
                >
                  {{ category.name }}
                </option>
              </select>
            </div>

            <div class="inputBox d-flex justify-content-end">
              <button class="btn btn-primary">Create Question</button>
            </div>
          </form>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-header">
          <h4>Create New Categoy</h4>
        </div>
        <div class="card-body">
          <form @submit.prevent="createCateory">
            <div class="inputBox mb-3">
              <label for="category_name">Name</label>
              <input
                type="text"
                class="form-control"
                :class="[errors.name ? 'border border-danger' : '']"
                id="category_name"
                v-model="c_form.name"
              />
              <small v-if="errors.name" class="text-danger">{{
                errors.name
              }}</small>
            </div>
            <div class="inputBox mb-3">
              <label for="category_slug">Slug</label>
              <input
                type="text"
                class="form-control"
                :class="[errors.slug ? 'border border-danger' : '']"
                id="category_slug"
                v-model="c_form.slug"
              />
              <small v-if="errors.slug" class="text-danger">{{
                errors.slug
              }}</small>
            </div>
            <div class="inputBox d-flex justify-content-end">
              <button class="btn btn-secondary">Create Category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </Master>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import Master from "../../Layout/Master";
import { Inertia } from "@inertiajs/inertia";
export default {
  props: ["auth_user", "categories", "errors"],
  components: { Master },
  setup() {
    const c_form = useForm({
      name: null,
      slug: null,
    });

    let createCateory = () => {
      Inertia.post("/question/category/store", c_form);
    };

    return { createCateory, c_form };
  },
};
</script>

<style>
</style>
