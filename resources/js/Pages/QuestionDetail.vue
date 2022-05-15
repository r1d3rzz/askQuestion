<template>
  <Master :auth_user="auth_user" :categories="categories">
    <div class="card">
      <div class="card-header">
        <div class="card mb-3">
          <div
            class="
              card-header
              bg-dark
              text-white
              d-flex
              justify-content-between
            "
          >
            <div>
              <span class="badge badge-white bg-danger me-2">Need fixed!</span>
              <span class="d-block d-md-inline">{{ question.title }}</span>
            </div>
            <div v-if="auth_user">
              <div v-if="auth_user.id === question.user_id">
                <span class="badge badge-white bg-warning me-2">fixed</span>
                <span class="badge badge-white bg-danger me-2">delete</span>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="my-3">
              <div
                class="
                  col-md
                  p-2
                  d-sm-block d-md-flex
                  justify-content-between
                  align-items-center
                "
              >
                <div>
                  <span class="me-2"
                    ><i class="far fa-heart text-danger"></i> 10
                  </span>
                  <span class="me-2"
                    ><i class="far fa-comment text-primary"></i> 5
                  </span>
                  <span class="me-2"
                    ><i class="far fa-star text-warning"></i> 1
                  </span>
                </div>

                <div>
                  <span class="badge badge-white bg-dark me-2">{{
                    question.category.name
                  }}</span>
                </div>
              </div>
            </div>

            <p>
              {{ question.body }}
            </p>
          </div>
        </div>

        <!--comments-->
        <Comments />
        <!--emd comments-->
      </div>
    </div>
  </Master>
</template>

<script>
import Comments from "./Comments";
import Master from "../Layout/Master";
export default {
  props: ["question", "auth_user", "categories"],
  components: {
    Comments,
    Master,
  },
};
</script>

<style>
</style>
