import _ from "lodash";

const w = [
  "bb315cb69bc74ace7a8155cd63a50ee6",
  "c94456d225d310aaa19aa25931277a6463aad602",
  "3db1a73a245aa55c61204c56c8d99f6d",
  "a8db1d82db78ed452ba0882fb9554fc9",
] as const;
const max = _.maxBy(w, (o) => o.length)?.length ?? 0;

let res = "";

for (let i = 0; i < max; ++i) {
    let code = 0;
    for (let j = 0; j < w.length; ++j) {
        if (!w[j][i]) {
            continue;
        }
        code += w[j].charCodeAt(i) - 48;
    }
    res += String.fromCharCode(code);
}

console.log(res);