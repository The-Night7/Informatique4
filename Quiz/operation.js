let x = -19;
let y = -1;
let z = -13;
let w = 13;
let a = 8;

if( (x <= y) || (z == w) ){
    a = a - 1;
}
else if( (x >= y) || (z < w) ){
    a = a + 1;
}
else {
    a = a + 3;
}

console.log(a);