<template>
  <div class="mt-">
    <h5 class="text-muted mb-3">Comments (3)</h5>
    <div v-for="item in 3" :key="item">
      <div class="card mb-3">
        <div class="card-header bg-dark text-white">
          <img
            src="https://i.pravatar.cc/150?u=fake@pravatar.com"
            width="40"
            class="rounded-circle me-3"
            alt=""
          />
          <span>User Name</span>
        </div>
        <div class="card-body">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse
          corporis debitis sint ducimus quam numquam, cumque ex ea labore
          itaque.
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>
