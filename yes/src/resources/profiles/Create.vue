<template>
  <va-create-layout>
    <profiles-form :title="title" :item="item"></profiles-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
