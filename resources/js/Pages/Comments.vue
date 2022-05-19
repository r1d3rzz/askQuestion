<template>
  <div class="mt-">
    <h5 class="text-muted mb-3" v-if="comments.length">
      Comments ({{ comments.length }})
    </h5>
    <div v-for="comment in comments" :key="comment.id">
      <div class="card mb-3">
        <div
          class="d-flex justify-content-between card-header bg-dark text-white"
        >
          <div>
            <img
              :src="'/storage/' + comment.author.avatar"
              width="40"
              class="rounded-circle me-3"
              alt=""
            />
            <span>{{ comment.author.name }}</span>
          </div>
          <div>
            <span>{{ comment.date }}</span>
          </div>
        </div>
        <div class="card-body">
          {{ comment.body }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted, onUpdated } from "@vue/runtime-core";
export default {
  props: ["comments"],
  setup(props) {
    props.comments = props.comments.sort((a, b) => b.id - a.id);

    onUpdated(() => {
      return (props.comments = props.comments.sort((a, b) => b.id - a.id));
    });
  },
};
</script>

<style>
</style>
