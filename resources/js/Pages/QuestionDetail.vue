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
                <span
                  @click="deleteQuestion(question.id)"
                  class="badge badge-white bg-danger me-2 deleteBtn"
                  >delete</span
                >
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
                  <span class="me-2">
                    <!--user like -->
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
                      <i class="far fa-heart text-danger"></i>
                    </span>
                    <!-- end user like -->
                    <span v-if="question.like_users.length" class="ms-1">
                      {{ question.like_users.length }}
                    </span>
                  </span>
                  <span class="me-2"
                    ><i class="far fa-comment text-primary"></i>
                    <span v-if="question.comments.length" class="ms-1">
                      {{ question.comments.length }}
                    </span>
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

            <div>
              <div v-if="auth_user">
                <form @submit.prevent="sendComment">
                  <textarea
                    rows="5"
                    class="form-control"
                    placeholder="comment your answer here"
                    v-model="form.comment"
                    required
                  ></textarea>
                  <small class="text-danger">{{ errors.comment }}</small>
                  <div class="mt-2 d-flex justify-content-end">
                    <input
                      type="submit"
                      value="Your Answer"
                      class="btn btn-sm btn-primary"
                    />
                  </div>
                </form>
              </div>
              <div v-else class="text-center py-2 text-muted">
                <small
                  >If You want to suggest this question.Please
                  <Link href="/user/login">Login</Link> first.</small
                >
              </div>
            </div>
          </div>
        </div>

        <!--comments-->
        <Comments :comments="question.comments" />
        <!--emd comments-->
      </div>
    </div>
  </Master>
</template>

<script>
import Comments from "./Comments";
import Master from "../Layout/Master";
import { ref } from "@vue/reactivity";
import { Inertia } from "@inertiajs/inertia";
import { useForm, Link } from "@inertiajs/inertia-vue3";
export default {
  props: ["question", "auth_user", "categories", "errors"],
  components: {
    Comments,
    Master,
    Link,
  },
  setup(props) {
    let users = [];
    let userIsLike = ref("false");

    props.question.like_users.forEach((user) => {
      users.push(user.id);
    });

    let isLike = (user_id) => {
      if (users.includes(user_id)) {
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

    const form = useForm({
      comment: null,
    });

    let sendComment = () => {
      Inertia.post("/question/comment/" + props.question.id, form);
      form.comment = "";
    };

    let deleteQuestion = (id) => {
      Inertia.post("/question/" + id + "/delete");
    };

    return { isLike, userIsLike, likeBtn, sendComment, form, deleteQuestion };
  },
};
</script>

<style>
.deleteBtn {
  user-select: none;
  cursor: pointer;
}
</style>
