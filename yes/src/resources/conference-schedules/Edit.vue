<template>
  <va-edit-layout>
    <conference-schedules-form :id="id" :title="title" :item="item"></conference-schedules-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
