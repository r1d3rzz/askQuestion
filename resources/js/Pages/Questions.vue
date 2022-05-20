<template>
  <div class="card mb-3">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
      <div>
        <span class="badge badge-white bg-danger me-2">Need fixed!</span>
        <span>{{ question.title }}</span>
      </div>
      <div v-if="auth_user">
        <div v-if="auth_user.id === question.user_id">
          <span class="badge badge-white bg-warning me-2">fixed</span>
          <span
            class="badge badge-white bg-danger me-2 deleteBtn"
            @click="deleteQuestion(question.id)"
            >delete</span
          >
        </div>
      </div>
    </div>
    <div class="card-body">
      <p>
        {{ question.body }}
      </p>
      <div class="row">
        <div
          class="col-md p-2 d-flex justify-content-between align-items-center"
        >
          <div>
            <span class="me-3">
              <!--qestion like user -->
              <span class="me-2">
                <span v-if="auth_user">
                  <i
                    :class="[
                      isLike(auth_user.id) == userIsLike ? 'far' : 'fas',
                    ]"
                    class="fa-heart text-danger"
                    @click="likeBtn(question.id)"
                  ></i>
                </span>
                <span v-else>
                  <span>
                    <i class="far fa-heart text-danger"></i>
                  </span>
                </span>

                <span v-if="question.like_users.length" class="ms-1">{{
                  question.like_users.length
                }}</span>
              </span>
              <!--end qestion like user -->

              <span class="me-2"
                ><i class="far fa-comment text-primary"></i>
                <span v-if="question.comments.length" class="ms-1">{{
                  question.comments.length
                }}</span>
              </span>
              <span class="me-2"
                ><i class="far fa-star text-warning"></i> 1
              </span>
            </span>

            <span class="d-block d-lg-inline">
              <Link :href="'/?category=' + question.category.slug"
                ><span class="badge badge-white bg-dark me-2">{{
                  question.category.name
                }}</span></Link
              >
            </span>
          </div>
          <div>
            <Link
              :href="route('question.detail', question.slug)"
              class="btn btn-dark btn-sm"
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
import { Inertia } from "@inertiajs/inertia";
import { ref } from "@vue/reactivity";

export default {
  props: ["question", "auth_user"],
  components: { Link },
  setup(props) {
    let likeUsers = [];
    let userIsLike = ref("false");

    props.question.like_users.forEach((user) => {
      likeUsers.push(user.id);
    });

    let isLike = (user_id) => {
      if (likeUsers.includes(user_id)) {
        return "true";
      } else {
        return "false";
      }
    };

    let likeBtn = (question_id) => {
      if (userIsLike.value == "true") {
        userIsLike.value = "false";
      } else {
        userIsLike.value = "true";
      }
      Inertia.post("/question/" + question_id + "/like");
    };

    let deleteQuestion = (question_id) => {
      Inertia.post("/question/" + question_id + "/delete");
    };

    return { isLike, likeBtn, userIsLike, deleteQuestion };
  },
};
</script>

<style>
.deleteBtn {
  cursor: pointer;
  user-select: none;
}
</style>
