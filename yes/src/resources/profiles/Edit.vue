<template>
  <va-edit-layout>
    <profiles-form :id="id" :title="title" :item="item"></profiles-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
