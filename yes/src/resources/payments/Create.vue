<template>
  <va-create-layout>
    <payments-form :title="title" :item="item"></payments-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
