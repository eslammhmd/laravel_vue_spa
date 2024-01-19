<template>
    <div>
      <h2 v-if="isNewStudent">Add Student</h2>
      <h2 v-else>Edit Student</h2>
        <form @submit.prevent="submitForm">
          <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input class="form-control" type="text" id="name" v-model="student.name" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <textarea class="form-control" id="email" v-model="student.email" required></textarea>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input class="form-control" type="number" id="phone" v-model="student.phone" required />
          </div>
          <button type="submit" v-if="isNewStudent" class="btn btn-primary">Add Student</button>
          <button type="submit" v-else class="btn btn-primary">Update Student</button>
        </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        student: {
          name: '',
          email: '',
          phone: 0
        }
      }
    },
    computed: {
      isNewStudent() {
        return !this.$route.path.includes('edit');
      }
    },
    async created() {
      if (!this.isNewStudent) {
        const response = await axios.get(`/api/student/${this.$route.params.id}`);
        this.student = response.data;
      }
    },
    methods: {
      async submitForm() {
        try {
          if (this.isNewStudent) {
            await axios.post('/api/student', this.student);
          } else {
            await axios.put(`/api/student/${this.$route.params.id}`, this.student);
          }
          this.$router.push('/');
        } catch (error) {
          console.error(error);
        }
      }
    }
  }
  </script>