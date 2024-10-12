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

const cards = [
  {
    id: 1,
    title: `What's a numpad?`,
    quest: 'Some people might remember T9 phone inputs, in which the numbers 2 to 9 have associated letters, and 0 acts as a space. Key 2 has "abc", 3 has "def" etc:<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre><br>  1   2   3<br>     abc def<br><br>  4   5   6<br> ghi jkl mno<br><br>  7   8   9<br>pqrs tuv wxyz<br>     <br>      0<br>      _<br></pre></div><br>Note that 0 is a space, not an underscore!<br> <br>To get a letter you press the button a certain number of times - pressing 2 once gives "a", twice gives "b".<br>The input is a list of number pairs: a key and the number of times it has been pressed. For example, "7 3" would be "r". What is the message this input produces?<br><br>',
    questLink: 'https://challenges.aquaq.co.uk/challenge/0',
    input: 'https://challenges.aquaq.co.uk/challenge/0/input.txt',
    answer: 'oh so they have internet on computers now',
    hint: 'This is a food',
    value: 'C'
  },
  {
    id: 2,
    title: `Rose by any other name`,
    quest: `Setting a colour attribute on your webpage can be much more interesting than it appears - HTML/CSS will take any string and convert it into a hexadecimal representation for use in a webpage. For instance, text with tag:<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>body bgcolor="kdb4life"</pre></div><br>produces a nice blue colour.<br>The conversion process happens like so:<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre><br>  Set the string's non-hexadecimal characters to 0.<br>  Pad the string length to the next multiple of 3.<br>  Split the result into 3 equal sections.<br>  The first two digits of each remaining section are the hex components.<br></pre></div><br>Above, "kdb4life" as an input string becomes <br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>0d40fe</pre></div><br>What is the six-character colour hex output of your input string?<br><br>`,
    questLink: 'https://challenges.aquaq.co.uk/challenge/1',
    input: 'https://challenges.aquaq.co.uk/challenge/1/input.txt',
    answer: 'd0000d',
    hint: '',
    value: '',
  },
  {
    id: 3,
    title: `One is all you need`,
    quest: `You've found a table which is supposed to record only unique values in the order they appeared. Looking closely, you realise that some of the values occur multiple times. Consulting the documentation, you see the original system was designed to only have data appended, so there was no way to correct broken inputs. <br><br>Instead, a record appearing more than once means that everything between the first instance of that record up to the latest occurrence was incorrect, and should be discarded. Values after this occurrence are treated as if those records in between hadn't existed. What is the sum of the values returned from your input after this process has been applied?<br><br>For example input: <br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>1 4 3 2 4 7 2 6 3 6<br><br>f[1 4 3 2 4 7 2 6 3 6]<br>1 4 7 2 6</pre></div><br><br>In this case, the summed answer would be 20.<br><br>`,
    questLink: 'https://challenges.aquaq.co.uk/challenge/2',
    input: 'https://challenges.aquaq.co.uk/challenge/2/input.txt',
    answer: '321',
    hint: '',
    value: '',
  },
  {
    id: 4,
    title: `This is good co-primen`,
    quest: `Co-primes, while not being the most exciting thing in the world, are extremely useful for cryptography (among other things). Numbers are co-prime if they don't share any common factors above 1.<br><br>For example, 15 and 8 are not prime, but have factors of 3 5 and 2 4 respectively, and so are co-prime. 15 and 9 are not co-prime, since they share a factor of 3.<br><br>For your input number, what is the sum of the positive co-primes of that number which are less than that number?<br><br>For example, the coprimes of 15 are<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>1 2 4 7 8 11 13 14</pre></div><br><br>If your input was 15, the answer would be 60.<br><br>`,
    questLink: 'https://challenges.aquaq.co.uk/challenge/4',
    input: 'https://challenges.aquaq.co.uk/challenge/4/input.txt',
    answer: '195153719200',
    hint: '',
    value: '',
  },
  {
    id: 5,
    title: `Let me count the ways`,
    quest: `It can be useful to know how to break down a number - usually this is done with factors, but instead, let's try it with summable components. For a number, you can work out the possible combinations of non-negative integers which sum to that number. For example, these are the combinations of three numbers which sum to 3:<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>0 0 3<br>0 1 2<br>0 2 1<br>0 3 0<br>1 0 2<br>1 1 1<br>1 2 0<br>2 0 1<br>2 1 0<br>3 0 0</pre></div><br><br>The digit "1" occurs 9 times above. For your input, how many times does the character "1" appear in all combinations summing to that number?<br><br>Note the number "11" would be twice, "21" once, so 1 21 11 would be 4 times.<br><br>`,
    questLink: 'https://challenges.aquaq.co.uk/challenge/6',
    input: 'https://challenges.aquaq.co.uk/challenge/6/input.txt',
    answer: '6927',
    hint: '',
    value: '',
  },
  {
    id: 6,
    title: ``,
    quest: ``,
    questLink: 'https://challenges.aquaq.co.uk/challenge/1',
    input: 'https://challenges.aquaq.co.uk/challenge/1/input.txt',
    answer: 'd0000d',
    hint: '',
    value: '',
  },
  {
    id: 7,
    title: ``,
    quest: ``,
    questLink: 'https://challenges.aquaq.co.uk/challenge/1',
    input: 'https://challenges.aquaq.co.uk/challenge/1/input.txt',
    answer: 'd0000d',
    hint: '',
    value: '',
  },
  {
    id: 8,
    title: ``,
    quest: ``,
    questLink: 'https://challenges.aquaq.co.uk/challenge/1',
    input: 'https://challenges.aquaq.co.uk/challenge/1/input.txt',
    answer: 'd0000d',
    hint: '',
    value: '',
  },
];

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
