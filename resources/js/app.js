import './bootstrap';
import { createApp } from 'vue';
import App from './components/App.vue'; // Importa el componente principal App.vue
import LoginForm from './components/LoginForm.vue';
import PasswordResetForm from './components/PasswordResetForm.vue';
import TaskList from './components/TaskList.vue';
import TaskDetails from './components/TaskDetails.vue';
import CommentForm from './components/CommentForm.vue';
import AttachmentForm from './components/AttachmentForm.vue';
import TaskReport from './components/TaskReport.vue';
import router from './router/router.'

const app = createApp({});

app.component('login-form', LoginForm);
app.component('password-reset-form', PasswordResetForm);
app.component('task-list', TaskList);
app.component('task-details', TaskDetails);
app.component('comment-form', CommentForm);
app.component('attachment-form', AttachmentForm);
app.component('task-report', TaskReport);



createApp(App).use(router).mount('#app');

