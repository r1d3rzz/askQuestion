<template>
  <AskQuestion :auth_user="auth_user" :categories="categories">
    <div class="create">
      <div class="card">
        <div class="card-header">
          <h3>Create Question</h3>
        </div>
        <div class="card-body">
          <form @submit.prevent="createQuestion">
            <div class="inputBox mb-3">
              <label for="title">Title</label>
              <input
                type="text"
                class="form-control"
                :class="[errors.title ? 'border border-danger' : '']"
                id="title"
                v-model="q_form.title"
              />
              <small v-if="errors.title" class="text-danger">{{
                errors.title
              }}</small>
            </div>
            <div class="inputBox mb-3">
              <label for="slug">Slug</label>
              <input
                type="text"
                class="form-control"
                :class="[errors.slug ? 'border border-danger' : '']"
                id="slug"
                v-model="q_form.slug"
              />
              <small v-if="errors.slug" class="text-danger">{{
                errors.slug
              }}</small>
            </div>
            <div class="inputBox mb-3">
              <label for="body">Body</label>
              <textarea
                type="text"
                rows="5"
                class="form-control"
                :class="[errors.body ? 'border border-danger' : '']"
                id="body"
                v-model="q_form.body"
              ></textarea>
              <small v-if="errors.body" class="text-danger">{{
                errors.body
              }}</small>
            </div>
            <div class="inputBox mb-3">
              <label for="category">Category</label>
              <select
                id="category"
                class="form-control"
                :class="[errors.category_id ? 'border border-danger' : '']"
                v-model="q_form.category_id"
              >
                <option value="" disabled selected>select category</option>
                <option
                  v-for="category in categories"
                  :value="category.id"
                  :key="category.id"
                >
                  {{ category.name }}
                </option>
              </select>
              <small v-if="errors.category_id" class="text-danger">{{
                errors.category_id
              }}</small>
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
                :class="[errors.c_slug ? 'border border-danger' : '']"
                id="category_slug"
                v-model="c_form.c_slug"
              />
              <small v-if="errors.c_slug" class="text-danger">{{
                errors.c_slug
              }}</small>
            </div>
            <div class="inputBox d-flex justify-content-end">
              <button class="btn btn-secondary">Create Category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AskQuestion>
</template>

<script>
import AskQuestion from "../../Layout/AskQuestion";
import { useForm } from "@inertiajs/inertia-vue3";
import Master from "../../Layout/Master";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "@vue/reactivity";
export default {
  props: ["auth_user", "categories", "errors"],
  components: {
    AskQuestion,
    Master,
  },
  setup() {
    const c_form = useForm({
      name: null,
      c_slug: null,
    });

    const q_form = useForm({
      title: null,
      slug: null,
      body: null,
      category_id: null,
    });

    let createQuestion = () => {
      Inertia.post("/question/store", q_form);
    };

    let createCateory = () => {
      Inertia.post("/question/category/store", c_form);
    };

    return { createCateory, c_form, createQuestion, q_form };
  },
};
</script>

<style>
</style>
