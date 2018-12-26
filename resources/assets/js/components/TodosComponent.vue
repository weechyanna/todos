<template>

  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <h1 class="todos-title">Todos</h1>

          <form @submit.prevent="addTask()">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="What needs to be done?" v-model="todo.title">
            </div>
          </form>

          <div class="todos-wrapper">
            <ul class="list-group todos-list">
              <li class="list-group-item todos-list-item" v-for="todo in todos">
                <strike v-if="todo.completed"><a @dblclick.prevent="editTask(todo)">{{ todo.title }}</a></strike>
                <a v-else @dblclick.prevent="editTask(todo)">{{ todo.title }}</a>

                <button @click.prevent="deleteTask(todo.id)" class="btn btn-danger btn-xs pull-right">Delete</button>
                <button @click.prevent="completeTask(todo)" class="btn btn-danger btn-xs pull-right">Done</button>

              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    data: function(){
      return {
        todos: [],
        editedTodo: null,
        todo: {
          id: '',
          title: '',
          completed: ''
        },
        edit: false
      };
    },
    mounted() {
      this.getTask();
    },
    methods: {
      getTask(){
        axios.get('/todos')
        .then(({ data }) => {
           this.todos = data;
        })
        .catch((err) => console.error(err));
      },
      addTask(){
        if(this.edit === false){
        axios.post('/todos',this.todo)
        .then(({ data }) => {
          this.todo.title = '';
          this.edit = false;
          this.getTask();
        })
        .catch((err) => console.error(err));
      } else {
        axios.put('/todos/' + this.todo.id, {
          title: this.todo.title
        })
          .then((res) => {
            this.todo.title = '';
            this.edit = false;
            this.getTask();
          })
          .catch((err) => console.error(err));
      }
    },
      deleteTask(id) {
        axios.delete('/todos/' + id)
        .then((response) => {
          this.getTask();

        })
        .catch((err) => console.error(err));
      },
      editTask(todo){
        this.edit = true;
        this.todo.id = todo.id;
        this.todo.title = todo.title;
        this.todo.completed = todo.completed;
      },

      completeTask(todo){
        axios.put('/todos/' + todo.id + '/complete', {
          completed: !todo.completed
        })
          .then((res) => {
            this.getTask();
          })
          .catch((err) => console.error(err));
      }
    }
  }
</script>
