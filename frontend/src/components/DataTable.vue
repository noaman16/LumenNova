<template>
  <div class="datatable">
    <h2>Datatable</h2>
    <table id="taskDataTable" class="display">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <!-- Add more columns as needed -->
        </tr>
      </thead>
      <tbody>
        <tr v-for="row in dataTableRows" :key="row.id">
          <td>{{ row.id }}</td>
          <td>{{ row.title }}</td>
          <td>{{ row.description }}</td>
          <!-- Add more columns as needed -->
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dataTableRows: [],
    };
  },
  mounted() {
    this.fetchDataTable();
  },
  methods: {
    async fetchDataTable() {
      try {
        const response = await this.$axios.get('/tasks_table_view');
        this.dataTableRows = response.data.data; // Adjust the property as per your server response
        this.initializeDataTable();
      } catch (error) {
        console.error('Error fetching DataTable:', error);
      }
    },
    initializeDataTable() {
      // Destroy any existing DataTable
      if ($.fn.DataTable.isDataTable('#taskDataTable')) {
        $('#taskDataTable').DataTable().destroy();
      }

      // Initialize DataTable
      $(document).ready(() => {
        $('#taskDataTable').DataTable({
          data: this.dataTableRows,
          columns: [
            { data: 'id', title: 'ID' },
            { data: 'title', title: 'Title' },
            { data: 'description', title: 'Description' },
            // Add more columns as needed
          ],
        });
      });
    },
  },
};
</script>

<style scoped>
/* Add any additional styles for your DataTable if needed */
</style>
