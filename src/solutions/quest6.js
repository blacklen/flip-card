const input = 123

const execute = (input) => {
  let res = 0;

  for (let i = 0; i < input + 1; i++) {
    for (let j = 0; j < input - i + 1; j++) {
      res += `${i}${j}${input - i - j}`.split('').filter(c => c === '1').length;
    }
  }

  console.log(res);
  return res;
}

execute(input);
