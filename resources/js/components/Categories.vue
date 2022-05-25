<template>
  <div class="categories">
    <div class="card">
      <div class="card-header text-center">
        <p>Category Lists</p>
      </div>
      <div class="card-body">
        <span v-for="category in uniqueCategories" :key="category">
          <Link class="list-group-item" :href="'/?category=' + category"
            >{{ category }}
          </Link>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  props: ["categories"],
  components: { Link },
  setup(props) {
    let categories = [];
    props.categories.forEach((category) => {
      categories.push(category.category.name);
    });

    let uniqueCategories = categories.filter((category, index, array) => {
      return array.indexOf(category) === index;
    });

    return { uniqueCategories };
  },
};
</script>
<style>
</style>
