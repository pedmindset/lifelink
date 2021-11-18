<template>
  <va-edit-layout>
    <conference-officials-form :id="id" :title="title" :item="item"></conference-officials-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
