<template>
  <va-edit-layout>
    <conference-form :id="id" :title="title" :item="item"></conference-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
