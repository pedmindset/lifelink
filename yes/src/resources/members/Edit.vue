<template>
  <va-edit-layout>
    <members-form :id="id" :title="title" :item="item"></members-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
