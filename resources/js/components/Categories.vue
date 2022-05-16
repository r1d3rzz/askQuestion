<template>
  <div class="categories">
    <div class="card">
      <div class="card-header">
        <h3>Category Lists</h3>
      </div>
      <div class="card-body">
        <span v-for="category in categories" :key="category.id">
          <Link class="list-group-item" :href="'/?category=' + category.slug"
            >{{ category.name }}
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
};
</script>
<style>
</style>
