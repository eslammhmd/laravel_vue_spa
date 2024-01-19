<template>
    <div>
        <table class="table table-responsive table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="student in students" :key="student.id">
                    <td>{{ student.id }}</td>
                    <td>{{ student.name }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.phone }}</td>
                    <td>
                      <div class="row gap-3">
                        <router-link :to="`/student/${student.id}`" class="p-2 col border btn btn-primary"><i class="fa-solid fa-eye"></i></router-link>
                        <router-link :to="`/student/${student.id}/edit`" class="p-2 col border btn btn-success"><i class="fa-solid fa-user-pen"></i></router-link>
                        <button @click="deleteProduct(student.id)" type="button" class="p-2 col border btn btn-danger"><i class="fa-solid fa-user-xmark"></i></button>
                      </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      students: []
    }
  },
  async created() {
    try {
      const response = await axios.get('/api/student');
      this.students = response.data;
    } catch (error) {
      console.error(error);
    }
  },
  methods: {
    async deleteProduct(id) {
      try {
        await axios.delete(`/api/student/${id}`);
        this.students = this.students.filter(student => student.id !== id);
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>