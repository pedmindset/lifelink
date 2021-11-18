<template>
  <va-edit-layout>
    <award-and-citations-form :id="id" :title="title" :item="item"></award-and-citations-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
