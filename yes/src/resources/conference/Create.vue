<template>
  <va-create-layout>
    <conference-form :title="title" :item="item"></conference-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
