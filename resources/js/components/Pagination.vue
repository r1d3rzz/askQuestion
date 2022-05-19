<template>
  <div class="paginate my-4">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-around">
        <li
          class="page-item"
          :class="[link.active ? 'active' : '']"
          v-for="link in links"
          :key="link"
        >
          <Link class="page-link" :href="link.url" v-html="link.label" />
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  props: ["links"],
  components: { Link },
};
</script>

<style>
</style>
