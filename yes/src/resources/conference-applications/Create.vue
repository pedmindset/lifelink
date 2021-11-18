<template>
  <va-create-layout>
    <conference-applications-form :title="title" :item="item"></conference-applications-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
