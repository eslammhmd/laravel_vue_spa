<template>
    <div>
        <span class="text-danger" id="associating-form-text-with-form-controls">ID :</span>
        <span class="ps-3">{{ student.id }}</span> <hr>
        <span class="text-danger" id="associating-form-text-with-form-controls">Name :</span>
        <span class="ps-3">{{ student.name }}</span><hr>
        <span class="text-danger" id="associating-form-text-with-form-controls">Email :</span>
        <span class="ps-3">{{ student.email }}</span><hr>
        <span class="text-danger" id="associating-form-text-with-form-controls">Phone :</span>
        <span class="ps-3">{{ student.phone }}</span><hr>
        <span class="text-danger" id="associating-form-text-with-form-controls">Phone :</span>
        <span class="ps-3">{{ student.phone }}</span><hr>
        <span class="text-danger" id="associating-form-text-with-form-controls">Created At :</span>
        <span class="ps-3">{{ student.created_at }}</span><hr>
        <span class="text-danger" id="associating-form-text-with-form-controls">Updated At :</span>
        <span class="ps-3">{{ student.updated_at }}</span><hr>
        <router-link :to="`/student/${student.id}/edit`" class="btn btn-primary">Edit</router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
data() {
    return {
        student: {}
    }
},
async created() {
    try {
    const response = await axios.get(`/api/student/${this.$route.params.id}`);
    this.student = response.data;
    } catch (error) {
    console.error(error);
    }
}
}
</script>