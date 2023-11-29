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
import 'datatables.net-bs4/css/dataTables.bootstrap4.css';
import 'datatables.net-bs4';

export default {
  data() {
    return {
      dataTableRows: [],
      dataTableInstance: null,
    };
  },
  mounted() {
    this.fetchDataTable();
  },
  watch: {
    dataTableRows: {
      handler() {
        this.initializeDataTable();
      },
      deep: true,
    },
  },
  methods: {
    async fetchDataTable() {
      try {
        const response = await this.$axios.get('/tasks_table');
        this.dataTableRows = response.data.data;
      } catch (error) {
        console.error('Error fetching DataTable:', error);
      }
    },
    initializeDataTable() {
      // Destroy any existing DataTable
      if (this.dataTableInstance) {
        this.dataTableInstance.destroy();
      }

      // Initialize DataTable
      this.$nextTick(() => {
        this.dataTableInstance = $(this.$el).find('#taskDataTable').DataTable({
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
