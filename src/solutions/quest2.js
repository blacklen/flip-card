const input = 'do you think that maybe like, 1 in 10 people could be actually robots?';
const input2 = 'kdb4life';

const execute = (input) => {
  const hexadecimal = input.split('').map(c => {
    if ((c >= '0' && c <= '9') || (c >= 'a' && c <= 'f')) return c;

    return '0';
  });
  const partLength = Math.ceil(hexadecimal.length / 3);
  const part1 = hexadecimal.slice(0, partLength);
  const part2 = hexadecimal.slice(partLength, partLength * 2);
  const part3 = hexadecimal.slice(partLength * 2);

  const res = [...part1.slice(0, 2), ...part2.slice(0, 2), ...part3.slice(0, 2)].join('');

  while (res.length < 6) res += '0';
  console.log(res);
  return res;
}

// rate: 5/10 - need to understand the requirement
execute(input);
