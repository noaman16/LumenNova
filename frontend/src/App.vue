<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

    <table id="myTable" class="table table-bordered mt-5">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>          
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
import $ from "jquery";

export default {
  mounted() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      axios
        .get("http://nova.local.com/tasks")
        .then((response) => {
          $("#myTable").DataTable({
            dom: "Bfrtip",
            buttons: ["colvis", "excel", "print", "csv"],
            data: response.data,
            columns: [
              { data: "id" },
              { data: "title" },
              { data: "description" },              
            ],
          });
        })
        .catch((error) => console.log(error.response));
    },
  },
};
</script>

<style></style>