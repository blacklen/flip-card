const input = `7 5 3 30 15 1 3 44 38 42 21 13 45 7 48 32 10 48 49 22 12 48 46 11 22 46 18 4 22 43 8 13 38 10 38 36 29 20 27 12 18 45 29 2 46 15 16 44 7 48 31 34 33 43 4 39 39 4 28 25 49 40 44 17 42 48 2 19 27 20 38 18 31 32 21 14 22 19 4 18 38 49 46 39 45 42 23 14 19 21 0 21 20 47 31 29 39 21 22 10 38 7 6 38 18 28 44 11 4 2 17 44 27 21 12 47 11 40 21 20 7 6 14 33 14 47 0 48 35 19 24 19 29 10 17 12 16 2 20 9 48 0 39 23 16 31 47 42 8 32 19 11 39 7 6 49 36 35 21 33 12 18 2 18 39 47 16 39 19 2 17 1 12 6 1 4 39 4 44 45 4 40 19 18 15 31 26 21 30 36 23 12 32 4 29 31 45 21 1 3 38 49 43 26 23 9 23 45 4 20 3 27 1 43 47 33 33 20 19 39 35 11 31 27 24 2 43 25 25 30 48 9 7 24 42 36 11 20 6 25 47 47 46 38 29 3 22 0 22 11 9 23 41 33 46 21 18 8 6 13 40 38 39 8 30 13 30 3 47 22 4 32 25 14 47 31 7 42 38 18 40 41 42 17 11 13 31 45 6 14 11 39 19 44 3 6 12 11 30 31 22 26 26 41 18 15 24 43 43 3 21 49 46 35 43 13 21 6 16 43 0 28 26 36 2 2 20 45 17 49 37 48 26 7 3 36 23 15 11 18 32 42 15 39 0 37 8 7 6 0 15 1 36 43 23 47 38 45 13 34 41 39 42 0 24 7 36 48 12 25 24 32 4 46 35 29 49 27 38 40 23 35 12 45 37 25 18 45 46 18 44 1 26 44 13 29 5 0 2 42 21 11 20 6 5 9 3 6 29 27 7 38 33 36 34 3 6 24 38 26 14 38 32 7 23 40 22 28 27 10 47 13 7 46 32 18 37 41 40 22 26 14 45 27 32 27 15 44 48 46 49 34 38 16 12 36 5 14 22 9 19 15 30 22 44 37 17 10 38 23 48 39 24 40 11 4 21 48 41 7 21 33 7 47 12 45 47 44 22 15 24 12 27 49 36 0 17 28 15 0 34 13 23 42 14 34 21 43 1 31 9 19 13 18 21 19 6 9 13 21 40 31 32 11 25 26 40 15 27 13 39 41 2 39 26 13 23 24 25 19 12 2 8 26 41 33 20 43 10 41 24 39 49 47 11 6 32 11 40 11 16 27 25 21 10 15 29 5 21 5 27 35 5 20 40 0 14 20 15 27 9 20 37 22 29 21 43 33 14 39 7 38 15 31 11 23 30 47 14 15 16 39 12 32 33 43 31 26 4 44 35 4 33 39 5 38 3 47 11 15 30 42 39 8 12 6 15 10 12 26 14 27 43 29 5 7 45 28 12 38 44 0 38 8 47 23 27 20 40 8 41 3 39 27 36 41 19 24 4 2 26 42 34 15 31 11 19 47 4 37 4 14 45 8 18 4 2 5 7 19 46 33 22 11 2 6 31 18 49 46 40 40 40 26 17 23 47 3 24 39 12 38 38 27 8 44 35 43 17 46 30 24 36 41 38 19 10 39 15 6 25 35 48 31 44 39 34 43 39 0 40 29 2 8 19 45 41 35 0 40 35 13 15 8 0 30 10 37 36 42 34 32 19 41 22 47 15 39 29 27 39 39 12 15 17 25 9 34 42 6 30 15 4 6 7 49 0 6 15 12 5 30 25 35 1 39 5 33 15 16 2 10 13 8 25 14 22 36 0 16 39 29 31 4 8 3 2 40 28 45 49 29 20 14 17 39 11 11 49 39 5 21 9 14 40 25 43 30 42 42 17 30 46 20 28 48 12 44 23 46 5 38 44 45 29 24 10 40 13 37 15 46 15 42 43 8 33 28 24 18 17 37 49 9 27 45 32 4 17 7 23 9 12 30 34 40 48 32 31 36 40 21 11 48 27 48 36 48 27 40 46 25 20 4 13 8 35 42 21 44 35 36 36 3 16 34 5 23 48 42 9 18 48 47 2 18 45 10 13 46 41 29 44 17 30 37 3 19 43 14 2 48 9 11 44 22 8 30 35 0 19 17 40 42 1 46 49 6 41 10 24 1 42 4 28 18 35 12 9 20 6 33 2 32 15 13 43 34 40 47 10 5 0 25 42 40 29 37 49 38 13 41 26 12 39 25 6 25 23 0 46 22 38 9 28 10 2 44 45 47`;

const input2 = `1 4 3 2 4 7 2 6 3 6`;

const execute = (input) => {
  const res = input.split(' ').reduce((acc, cur) => {
    const index = acc.findIndex(c => c === cur);

    if (index >= 0) return acc.slice(0, index + 1);

    acc.push(cur);
    return acc;
  }, []).reduce((sum, cur) => +sum + +cur, 0);

  console.log(res);
  return res;
}

execute(input);
