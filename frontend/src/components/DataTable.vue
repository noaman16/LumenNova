<template>
  <div>
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
import "bootstrap/dist/css/bootstrap.min.css";
import "datatables.net-bs4";
import "datatables.net-bs4/css/dataTables.bootstrap4.min.css";
import "jszip";
import "pdfmake";
import "datatables.net-buttons-bs4";
import "datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css";
import "datatables.net-buttons/js/buttons.colVis";
import "datatables.net-buttons/js/buttons.flash";
import "datatables.net-buttons/js/buttons.html5";
import "datatables.net-buttons/js/buttons.print";



export default {
  mounted() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      this.$axios
        .get("/tasks")
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

<style scoped>
.desktop-size {
  width: 100%; /* Set the width to 100% of the container */
  max-width: 1200px; /* Set a maximum width if needed */
  margin: 0 auto; /* Center the component horizontally */
}

/* Add any component-specific styles here */
</style>

