import fs from 'fs';

const input = `dog,war
bow,ply
tree,fled
fire,park
forge,house
stall,chili
start,great
inner,outer
asking,bobble
coffee,drawer`

const buildTemplates = (word) => {
  const splitWord = word.split('');

  return splitWord.map((_, index) => {
    const temp = [...splitWord];
    temp[index] = '_';
    return temp.join('');
  })
}

const buildWordbook = (works) => {
  const res = {};

  works.split('\n').forEach(word => {
    const templates = buildTemplates(word);

    templates.forEach(temp => res[temp] = [...(res[temp] || []), word]);
  });

  return res;
}

const findPath = (start, end, wordbook) => {
  const done = [];
  const queue = [{ word: start, step: 1 }];

  while (queue.length) {
    const { word, step } = queue.shift();

    if (done.includes(word)) continue;

    if (word === end) return step;

    done.push(word);
    const templates = buildTemplates(word);
    templates.forEach(temp => {
      wordbook[temp].forEach(w => {
        if (!done.includes(w)) {
          queue.push({ word: w, step: step + 1 });
        }
      })
    });
  }
}

const execute = (input) => {
  const words = fs.readFileSync('../assets/words.txt', 'utf8');
  const wordbook = buildWordbook(words);
  const res = input.split('\n').reduce((acc, cur) => {
    const [start, end] = cur.split(',');
    const numberOfSteps = findPath(start, end, wordbook);
    return acc *= numberOfSteps;
  }, 1);

  console.log(res);
  return res;
}

// rate 10/10
execute(input);
