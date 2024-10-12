const input = `6 3
4 2
0 1
7 4
6 3
0 1
8 1
4 2
3 2
9 3
0 1
4 2
2 1
8 3
3 2
0 1
4 3
6 2
8 1
3 2
7 3
6 2
3 2
8 1
0 1
6 3
6 2
0 1
2 3
6 3
6 1
7 1
8 2
8 1
3 2
7 3
7 4
0 1
6 2
6 3
9 1`;

const execute = (input) => {
  const query = [' ', '', 'abc', 'def', 'ghi', 'jkl', 'mno', 'pqrs', 'tuv', 'wxyz'];

  const commands = input.split('\n');
  const res = commands.map(command => {
    const [index, f] = command.split(' ');
    return query[index][f - 1];
  }).join('');
  console.log(res);
  return res;
}

// rate: 1/10
execute(input);
