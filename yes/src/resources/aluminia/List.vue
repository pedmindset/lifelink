<template>
  <base-material-card :icon="resource.icon" :title="title">
    <va-list :filters="filters">
      <va-data-table :fields="fields">
      </va-data-table>
    </va-list>
  </base-material-card>
</template>

<script>
export default {
  props: ["resource", "title"],
  data() {
    return {
      filters: ["name"],
      fields: [
        { source: "name", sortable: true },
      ],
    };
  },
  mounted() {
    console.log(this.fields);
  },
};
</script>
