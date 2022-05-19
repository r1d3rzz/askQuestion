<template>
  <div class="mt-">
    <h5 class="text-muted mb-3" v-if="comments.length">
      Comments ({{ comments.length }})
    </h5>
    <div v-for="comment in comments" :key="comment.id">
      <div class="card mb-3">
        <div class="card-header bg-dark text-white">
          <img
            :src="'/storage/' + comment.author.avatar"
            width="40"
            class="rounded-circle me-3"
            alt=""
          />
          <span>{{ comment.author.name }}</span>
        </div>
        <div class="card-body">
          {{ comment.body }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["comments"],
};
</script>

<style>
</style>
