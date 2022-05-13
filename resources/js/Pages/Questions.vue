<template>
  <div class="card mb-3">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
      <div>
        <span class="badge badge-white bg-danger me-2">Need fixed!</span>
        <span>What is HTML</span>
      </div>
      <div>
        <span class="badge badge-white bg-warning me-2">fixed</span>
        <span class="badge badge-white bg-danger me-2">delete</span>
      </div>
    </div>
    <div class="card-body">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
        vitae ut aperiam cum aut officia animi nostrum, aliquam ipsum, labore,
        fuga ea tenetur! Quaerat eligendi id commodi autem atque rem architecto
        quibusdam ullam nulla deserunt fugit hic maxime eaque consectetur nam,
        cumque non praesentium culpa suscipit consequatur inventore magni nihil
        ab vel! Veniam esse obcaecati, ea doloremque.
      </p>
      <div class="row">
        <div
          class="col-md p-2 d-flex justify-content-between align-items-center"
        >
          <div>
            <span class="me-3">
              <span class="me-2"
                ><i class="far fa-heart text-danger"></i> 10
              </span>
              <span class="me-2"
                ><i class="far fa-comment text-primary"></i> 5
              </span>
              <span class="me-2"
                ><i class="far fa-star text-warning"></i> 1
              </span>
            </span>

            <span class="d-block d-lg-inline">
              <span class="badge badge-white bg-dark me-2">Android</span>
              <span class="badge badge-white bg-dark me-2">Ios</span>
              <span class="badge badge-white bg-dark me-2">Window</span>
              <span class="badge badge-white bg-dark me-2">Mac</span>
            </span>
          </div>
          <div>
            <Link href="/question/detail" class="btn btn-dark btn-sm"
              >View</Link
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: { Link },
};
</script>

<style>
</style>
