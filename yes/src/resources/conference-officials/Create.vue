<template>
  <va-create-layout>
    <conference-officials-form :title="title" :item="item"></conference-officials-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
