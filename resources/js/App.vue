<template lang="pug">
.app
  Card(
    v-for="card in cardRenderer",
    :key="card.key",
    :card="card",
  )
  QuestModal
</template>

<script setup>
import { computed, onBeforeUnmount, onMounted, ref } from 'vue';
import Card from './components/Card.vue';
import QuestModal from './components/QuestModal.vue';

const renderKey = ref(1);

const cards = window.quests;

const cardRenderer = computed(() => {
  const answerStorage = localStorage.getItem('submitted-answer');
  const data = JSON.parse(answerStorage || '{}');

  return cards.map(card => ({
    ...card,
    key: `${card.id}-${renderKey.value}`,
    isSubmit: !!data[card.id],
    pass: data[card.id] == card.answer,
  }))
});

onMounted(() => {
  document.addEventListener('quest-submitted', () => renderKey.value += 1);
})

onBeforeUnmount(() => {
  document.removeEventListener('quest-submitted', () => renderKey.value += 1);
})
</script>

<style lang="css" scoped>
.app {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}
</style>
