<template>
  <va-create-layout>
    <announcements-form :title="title" :item="item"></announcements-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
