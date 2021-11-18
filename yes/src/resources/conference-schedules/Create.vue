<template>
  <va-create-layout>
    <conference-schedules-form :title="title" :item="item"></conference-schedules-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
