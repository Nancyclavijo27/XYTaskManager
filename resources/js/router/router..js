import { createRouter, createWebHistory } from 'vue-router';
import LoginForm from "../components/LoginForm.vue";
import PasswordResetForm from '../components/PasswordResetForm.vue';
import TaskList from '../components/TaskList.vue';
import TaskDetails from '../components/TaskDetails.vue';
import CommentForm from '../components/CommentForm.vue';
import AttachmentForm from '../components/AttachmentForm.vue';
import TaskReport from '../components/TaskReport.vue';

const routes = [
  { path: '/login', component: LoginForm },
  { path: '/password-reset', component: PasswordResetForm },
  { path: '/tasks', component: TaskList },
  { path: '/tasks/:id', component: TaskDetails },
  { path: '/tasks/:id/comments', component: CommentForm },
  { path: '/tasks/:id/attachments', component: AttachmentForm },
  { path: '/task-report', component: TaskReport },
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
