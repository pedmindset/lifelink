<template>
  <va-create-layout>
    <aluminia-form :title="title" :item="item"></aluminia-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
