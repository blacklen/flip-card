import fs from 'fs';

const WINNING_POINT = 21;

const execute = () => {
  const input = fs.readFileSync('../assets/input8.txt', 'utf8').replace('\n', '');
  const cardPoints = {
    'A': [1, 11],
    'J': [10],
    'Q': [10],
    'K': [10],
  }

  for (let i = 2; i < 11; i++) {
    cardPoints[i] = [i];
  }

  let currentPoint = [0];


  const res = input.split(' ').reduce((acc, cur) => {
    const point = cardPoints[cur];

    currentPoint = point.reduce((pAcc, pCur) => {
      return [...pAcc, ...currentPoint.map(p => p + pCur)]
    }, []);
    currentPoint = currentPoint.filter(p => p <= WINNING_POINT);

    // win
    if (currentPoint.includes(WINNING_POINT)) {
      acc += 1;
      currentPoint = [0];
    }

    // lose
    if (!currentPoint.length) {
      currentPoint = [0];
    }

    return acc;
  }, 0);

  console.log(res);
  return res;
}

execute()
