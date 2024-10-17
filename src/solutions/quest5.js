const input = 987820;

const execute = (input) => {
  const getPrimeFactors = (n)=> {
    const factors = new Set();
    while (n % 2 === 0) {
        factors.add(2);
        n = n / 2;
    }
    for (let i = 3; i <= Math.sqrt(n); i += 2) {
        while (n % i === 0) {
            factors.add(i);
            n = n / i;
        }
    }
    if (n > 2) {
        factors.add(n);
    }

    return [...factors];
  }

  const isFactor = (n, factors) => {
    for (let f of factors) {
      if (n % f === 0) return true;

      if (f > n) return false;
    }

    return false;
  }

  const factors = getPrimeFactors(input);
  let res = 0;

  for (let i = 1; i < input; i++) {
    if (!isFactor(i, factors)) res += i;
  }

  console.log(res);
  return res;
}

// math
execute(input);
