<template>
  <div>
    <h2>Data Table</h2>
    <table id="dataTable">
      <!-- DataTable content goes here -->
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // DataTable options or configurations
    };
  },
  mounted() {
    // Fetch data from the server and initialize the DataTable
    this.fetchData();
  },
  methods: {
    fetchData() {
      // Make an API request to fetch data from the server
      // Example using Axios
      // You may need to adjust this based on your server-side implementation
      this.$axios.get('/tasks_table_view').then(response => {
        // Initialize the DataTable with the fetched data
        $('#dataTable').DataTable({
          data: response.data,
          columns: [
            // Define your DataTable columns based on your data structure
            { data: 'id', title: 'ID' },
            { data: 'title', title: 'Title' },
            { data: 'description', title: 'Description' },
            // ... other columns
          ],
        });
      }).catch(error => {
        console.error('Error fetching data:', error);
      });
    },
  },
};
</script>

<style scoped>
/* Add any component-specific styles if needed */
</style>
