<template>
  <va-edit-layout>
    <announcements-form :id="id" :title="title" :item="item"></announcements-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
