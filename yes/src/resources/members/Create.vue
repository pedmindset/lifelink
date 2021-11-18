<template>
  <va-create-layout>
    <members-form :title="title" :item="item"></members-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
