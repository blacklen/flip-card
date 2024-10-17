<template lang="pug">
Modal(
  name="quest-modal",
  wrapper-class="animate__animated",
  :in-class="`animate__zoomIn`"
  :out-class="`animate__zoomOut`",
)
  .quest-wrapper
    .quest-body
      .quest-title {{ card.title }}
      .quest-content(v-html="card.quest")
    .quest-action
      button.input-btn(@click="getInput") Get Input
      .quest-submit
        label Answer
        input.answer(
          :class="{'invalid': invalid}",
          v-on:keyup.enter="submit",
          v-model="answer",
        )
        button.submit-btn(
          @click="submit"
        ) Submit
</template>

<script setup>
import { Modal, useModal } from '@kouts/vue-modal';
import { onBeforeUnmount, onMounted, ref, watch } from 'vue';

const { show, hide } = useModal();

const card = ref({});
const answer = ref('');
const invalid = ref(false);

watch(() => answer.value, () => invalid.value = false)

const getInput = () => {
  window.open(card.value.input)
}

const open = (data) => {
  answer.value = '';
  invalid.value = false;

  card.value = data;
  show('quest-modal');
}

const submit = () => {
  const answerStorage = localStorage.getItem('submitted-answer');
  const data = JSON.parse(answerStorage || '{}');
  data[card.value.id] = answer.value;

  localStorage.setItem('submitted-answer', JSON.stringify(data));

  if (answer.value == card.value.answer) {
    hide('quest-modal');
  } else {
    invalid.value = true;
  }

  document.dispatchEvent(new CustomEvent('quest-submitted'));
}

onMounted(() => {
  document.addEventListener('open-quest', (e) => open({ ...e.detail }))
});

onBeforeUnmount(() => {
  document.removeEventListener('open-quest', (e) => open({ ...e.detail }));
});
</script>

<style>
@import 'animate.css';

@keyframes shake {
  0% {
    margin-left: 0rem;
  }
  25% {
    margin-left: 0.5rem;
  }
  75% {
    margin-left: -0.5rem;
  }
  100% {
    margin-left: 0rem;
  }
}

.vm-titlebar {
  display: none;
}

.vm-content {
  padding: 0 !important;
  color: #000;
}

.vm-wrapper {
  display: flex;
  align-items: center;
}

.vm-wrapper .vm {
  top: auto;
  border-radius: 6px;
}

.quest-wrapper {
  background-color: #fff;
  width: 600px;
  padding: 20px 10px;
  border-radius: 6px;
}

.quest-title {
  font-size: 25px;
  font-weight: bold;
  margin-bottom: 10px;
}

.quest-body {
  max-height: 500px;
  overflow-y: scroll;
  overflow-x: hidden;
  padding: 0 20px;
}

.quest-action {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 30px;
  padding: 10px;
}

.quest-submit {
  display: flex;
  align-items: center;
  gap: 10px;
  height: 30px;
}

.quest-submit label {
  font-size: .875em;
}

.quest-submit .answer {
  flex-grow: 1;
  border-radius: 6px;
  border: 1px solid #eee;
  height: 100%;
}

input.invalid {
  border: 1px solid #da3b0f !important;
  animation: shake 0.2s ease-in-out 0s 2;
}

.quest-body:hover .quest-body::-webkit-scrollbar {
  display: block;
}

.quest-body::-webkit-scrollbar {
  width: 4px;
  border-radius: 6px;
  background-clip: padding-box;
  border: 2px solid transparent;
}

.quest-body::-webkit-scrollbar-thumb {
  border-radius: 4px;
  background-color: rgba(0, 0, 0, .5);
  box-shadow: 0 0 1px rgba(255, 255, 255, .5);
}
</style>
