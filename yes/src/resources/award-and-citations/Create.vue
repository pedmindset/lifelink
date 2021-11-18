<template>
  <va-create-layout>
    <award-and-citations-form :title="title" :item="item"></award-and-citations-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
